<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\Subscribe;
use App\Models\Tag;
use App\Models\Form;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Wishlist;
use App\Models\OrderStatus;
use App\Models\TagCategory;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\Carbon;

class ApiController extends Controller
{
    // PRODUCTS
    public function GetAllProducts(Request $request, $id = null)
    {
        $query = Product::with(['documents:id,belong_id,original_name,encoded_name,title'])
            ->where('deleted', 0);

        if ($id) {
            $query->where('id', $id);
        } elseif ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('sub_category_id')) {
            $query->where('sub_category_id', $request->sub_category_id);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($request->filled('price_min') || $request->filled('price_max')) {
            $min = (float) ($request->price_min ?? 0);
            $max = (float) ($request->price_max ?? Product::max('price'));
            $query->whereBetween('price', [$min, $max]);
        }

        $sortBy = $request->input('sort_by');
        switch ($sortBy) {
            case 'popularity':
                $query->orderBy('popularity', 'desc');
                break;
            case 'new_arrivals':
                $query->orderBy('created_at', 'desc');
                break;
            case 'low_to_high':
                $query->orderBy('price', 'asc');
                break;
            case 'high_to_low':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('id', 'desc');
                break;
        }

        $perPage = (int) $request->input('per_page', 10);
        $products = $query->paginate($perPage);

        return response()->json([
            'status' => 'success',
            'message' => 'Products fetched successfully',
            'data' => $products
        ], 200);
    }
    public function GetAllCategories()
    {
        $categories = Category::with(['subcategories' => function($q) {
                $q->select('id', 'name', 'category_id');
            }])
            ->where('deleted', 0)
            ->select('id', 'name', 'icon')
            ->get();


        return response()->json([
            'status' => 'success',
            'message' => 'Categories fetched successfully',
            'data' => $categories
        ], 200);
    }


    // BLOGS
    public function GetAllBlogs(Request $request, $url=null)
    { 
        $blogs = Blog::with(['document'])
            ->where('deleted', 0)
            ->when($url, function($q) use ($url) {
                return $q->where('slug', 'LIKE', '%' . $url . '%');
            })
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->when($request->filled('category'), fn($q) => $q->where('category', $request->category))
            ->when($request->filled('user_id'), fn($q) => $q->where('user_id', $request->user_id))
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Blogs fetched successfully',
            'data' => $blogs
        ], 201);
    }


    // FORMS
    public function SaveContactForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'nullable|string|max:100',
            'email'        => 'required|email|max:150',
            'phone'        => 'nullable|string|max:150',
            'message'      => 'nullable|string|max:150',
            'bundle_size'  => 'nullable|string|max:255',
            'other_bundle' => 'nullable|string|max:255',
            'save_info'    => 'nullable|boolean',
        ], [
            'email.required'     => 'Email is required.',
            'email.email'        => 'Please enter a valid email address.',
            'phone.string'       => 'Phone must be a valid string.',
            'message.string'     => 'Message must be a valid string.',
            'bundle_size.string' => 'Please provide a valid bundle size.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors()
            ], 422);
        }

        $input = $request->all();
        $validated = $validator->validated();

        $form               = new Form();
        $form->type         = $input['type'];
        $form->name         = $input['name'] ?? '';
        $form->email        = $input['email'];
        $form->phone        = $input['phone'] ?? '';
        $form->message      = $input['message'] ?? '';
        $form->bundle_size  = $input['bundle_size'] ?? '';
        $form->other_bundle = $input['other_bundle'] ?? '';
        $form->save_info    = $input['save_info'] ?? 0;
        $form->save();

        return response()->json([
            'status'  => true,
            'message' => 'Form saved successfully!',
            'data'    => $form
        ], 201);
    }


    // WISHLISTS
    public function AddProductToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $wishlist = Wishlist::firstOrCreate(
            [
                'user_id'    => $request->user_id,
                'product_id' => $request->product_id,
            ]
        );

        return response()->json([
            'status'  => true,
            'message' => $wishlist->wasRecentlyCreated 
                ? 'Product added to wishlist.' 
                : 'Product already in wishlist.',
            'data'    => $wishlist,
        ]);
    }
    public function GetUserAllWishlists($id)
    {
        $wishlist = Wishlist::where('user_id', $id)
            ->with(['product' => function ($q) {
                $q->select('id', 'name')
                ->with('documentTitle');
            }])
            ->get();

        $data = $wishlist->map(function ($item) {
            return [
                'id'      => $item->id,
                'product' => [
                    'id'       => $item->product->id ?? null,
                    'name'     => $item->product->name ?? null,
                    'document' => $item->product->documentTitle ?? null,
                ],
            ];
        });

        return response()->json(['success' => true, 'data' => $data]);
    }
    public function RemoveProductToWishlist($id)
    {
        Wishlist::where('id', $id)->delete();

        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }


    // AUTHENTICATION
    public function RegisterNewUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation errors',
                'errors'  => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name'     => $request->first_name . ' ' . $request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'User registered successfully',
            'data'    => $user
        ]);

    }
    public function LoginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation errors',
                'errors'  => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user->api_token = Str::random(60);
        $user->save();

        return response()->json([
            'status' => true,
            'token'  => $user->api_token,
            'user'   => [
                'id'        => $user->id,
                'name'      => $user->name,
                'email'     => $user->email,
                'phone'     => $user->phone ?? null,
                'role'      => $user->role ?? null,
                'status'    => $user->status ?? null,
                '_token' => $user->api_token
            ]
        ]);
    }
    public function GetLoggedInUserDetail(Request $request)
    {
        $id        = $request->input('id');
        $api_token = 123456;

        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid user.'
            ], 422);
        }

        $data = [];
        $data['user'] = User::where('id', $id)->first(['id','name','email', 'phone', 'role']);
        $data['billing_details'] = Customer::where('user_id', $user->id)->first();
        $orders = Order::with(['orderProducts.products' => function ($q) {
                $q->select('id', 'name', 'price');
            }])
            ->where('user_id', $user->id)
            ->get(['id', 'sub_total', 'status']);

        $data['orders'] = $orders->map(function ($order) {
            return [
                'id'            => $order->id,
                'sub_total'     => $order->sub_total,
                'status'        => $order->status,
                'product_count' => $order->orderProducts->count(),
                'ordered_on' => Carbon::parse($order->created_at)->format('jS M Y h:ia') ?? '',
            ];
        });

        return response()->json([
            'success'  => true,
            'message'  => 'User details fetched successfully.',
            'data'     => $data
        ]);
    }
    public function UpdateUserDetail(Request $request)
    {
        $id        = $request->input('id');
        // $api_token = $request->input('api_token');

        $user = User::where('id', $id)
            // ->where('api_token', $api_token)
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid user or token.'
            ], 401);
        }

        $validated = $request->validate([
            'name'                  => 'nullable|string|max:255',
            'email'                 => 'nullable|email|unique:users,email,' . $user->id,
            'phone'                 => 'nullable|string|max:20',
            'current_password'      => 'nullable|string',
            'new_password'          => 'nullable|string|min:6|confirmed', 
        ]);

        if (isset($validated['name'])) {
            $user->name = $validated['name'];
        }
        if (isset($validated['email'])) {
            $user->email = $validated['email'];
        }
        if (isset($validated['phone'])) {
            $user->phone = $validated['phone'];
        }

        if (!empty($validated['current_password']) && !empty($validated['new_password'])) {
            if (!Hash::check($validated['current_password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Current password is incorrect.'
                ], 422);
            }

            $user->password = Hash::make($validated['new_password']);
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User details updated successfully.',
            'user'    => $user
        ]);
    }




    // ORDER
    public function placeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'required|string|max:20',
            'company_name'     => 'nullable|string|max:255',
            'company_address'  => 'nullable|string|max:255',
            'address'          => 'required|string|max:255',
            'apartment'        => 'nullable|string|max:255',
            'town'             => 'nullable|string|max:255',
            'city'             => 'required|string|max:255',
            'country'          => 'required|string|max:100',
            'zip_code'         => 'required|string|max:20',
            'create_account'   => 'required|integer|max:1',
            'sub_total'        => 'required|numeric',
            'order_note'       => 'nullable|string',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.quantity'   => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation errors',
                'errors'  => $validator->errors()
            ], 422);
        }

        $customer = Customer::create([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'email'           => $request->email,
            'phone'           => $request->phone,
            'company_name'    => $request->company_name,
            'company_address' => $request->company_address,
            'address'         => $request->address,
            'apartment'       => $request->apartment,
            'town'            => $request->town,
            'city'            => $request->city,
            'country'         => $request->country,
            'zip_code'        => $request->zip_code,
            'create_account'  => $request->create_account ?? 0,
        ]);

        $user = null;

        if ($request->create_account == 1) {

            $existingUser = User::where('email', $request->email)->first();

            if (!$existingUser) {
                $user = User::create([
                    'name'     => $request->first_name . ' ' . $request->last_name,
                    'email'    => $request->email,
                    'phone'    => $request->phone,
                    'password' => Hash::make(Str::random(10)),
                    'role'     => 'customer',
                ]);

                // Mail::($request->email);
            } else {
                $user = $existingUser;
            }
        }

        $order = Order::create([
            'customer_id' => $customer->id,
            'user_id'     => $user ? $user->id : null,
            'sub_total'   => $request->sub_total,
            'order_note'  => $request->order_note,
            'address'     => $request->address,
            'apartment'   => $request->apartment,
            'town'        => $request->town,
            'city'        => $request->city,
            'country'     => $request->country,
            'status'      => 'Pending',
        ]);

        foreach ($request->products as $product) {
            OrderProduct::create([
                'user_id'     => $user ? $user->id : null,
                'customer_id' => $customer->id,
                'order_id'    => $order->id,
                'product_id'  => $product['product_id'],
                'quantity'    => $product['quantity'],
            ]);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Order placed successfully',
            'order_id' => $order->id
        ]);
    }
}
