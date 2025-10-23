<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Forms;
use App\Mail\Contact;
use App\Mail\Subscribe;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Form;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    



	public function index()
    {

        return view('index',
            [
                
            ]
        );
    }

    public function contact()
    {

        return view('contact',
            [

            ]
        );
    }

	public function about()
    {

        return view('about',
            [

            ]
        );
    }


    public function shop(Request $request)
    {
        $categories = Category::where('deleted', 0)->get();
        $minPrice = Product::where('deleted', 0)->min('price');
        $maxPrice = Product::where('deleted', 0)->max('price');

        $products = Product::with(['documents' => function($q) {
                $q->select('belong_id', 'original_name', 'encoded_name', 'title');
            }])
            ->when($request->filled('id'), fn($q) => $q->where('id', $request->id))
            ->when($request->filled('category_id'), fn($q) => $q->where('category_id', $request->category_id))
            ->when($request->filled('sub_category_id'), fn($q) => $q->where('sub_category_id', $request->sub_category_id))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->filled('price_min') && $request->filled('price_max'), function ($q) use ($request) {
                $q->whereBetween('price', [$request->price_min, $request->price_max]);
            })
            ->when($request->filled('sort_by'), function ($q) use ($request) {
                switch ($request->sort_by) {
                    case 'popularity':
                        $q->orderBy('popularity', 'desc');
                        break;
                    case 'new_arrivals':
                        $q->orderBy('created_at', 'desc');
                        break;
                    case 'low_to_high':
                        $q->orderBy('price', 'asc');
                        break;
                    case 'high_to_low':
                        $q->orderBy('price', 'desc');
                        break;
                    default:
                        $q->orderBy('id', 'desc');
                }
            })
            ->where('deleted', 0)
            ->paginate($request->paginate ?? 9);

        if ($request->ajax()) {
            $html = view('partials.product-list', compact('products'))->render();

            return response()->json([
                'html' => $html,
            ]);
        }

        return view('shop', compact('products','categories','minPrice','maxPrice'));
    }

    public function product_detail($url)
    {
        $product = Product::where('url', $url)->first();
        $products = Product::where('deleted', 0)->take(4)->get();

        return view('product-detail', compact('product','products'));
    }

    public function our_service()
    {

        return view('our-service',
            [

            ]
        );
    }

    public function service_detail()
    {

        return view('service-detail',
            [

            ]
        );
    }

    public function cart()
    {

        return view('cart',
            [

            ]
        );
    }

    public function my_account()
    {
        if( Auth::check() )
        {
            $user = Auth::user();
            $orders = Order::where('user_id', Auth::user()->id)->latest()->take(5)->get();

            // print_r($orders); exit;

            return view('my-account', compact('user', 'orders'));

        } else {

            return redirect()->route('/')->with('error', 'No Page Found');
        }
    }

    public function checkout()
    {
        if(session()->has('cart') && count(session('cart')) > 0){
            return view('checkout');
        } else {
            return redirect()->back()->with('error', 'Your Cart is empty.');
        }
    }

    public function placeOrder(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty. Please add products to cart before placing an order.');
        }

        $customer = Customer::create([
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'company_name'   => $request->company_name ?? '',
            'address'        => $request->address,
            'apartment'      => $request->apartment ?? '',
            'town'           => $request->town,
            'city'           => $request->city,
            'country'        => $request->country,
            'zip_code'       => $request->zip_code,
            'create_account' => $request->create_account ?? 0,
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

                // Optionally send welcome email
                // Mail::to($request->email)->send(new WelcomeMail($user));
            } else {
                $user = $existingUser;
            }
        } elseif ($request->create_account == 0 && Auth::check()) {
            $user = User::where('id', Auth::user()->id)->first();
        }

        $subTotal = 0;

        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if ($product) {
                $subTotal += $product->price * $item['quantity'];
            }
        }

        $order = Order::create([
            'customer_id' => $customer->id,
            'user_id'     => $user ? $user->id : null,
            'sub_total'   => $subTotal,
            'order_note'  => $request->order_note ?? '',
            'address'     => $request->address,
            'apartment'   => $request->apartment ?? '',
            'town'        => $request->town,
            'city'        => $request->city,
            'country'     => $request->country,
            'status'      => 'Pending',
        ]);

        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if ($product) {
                OrderProduct::create([
                    'user_id'     => $user ? $user->id : null,
                    'customer_id' => $customer->id,
                    'order_id'    => $order->id,
                    'product_id'  => $product->id,
                    'quantity'    => $item['quantity'],
                ]);
            }
        }

        Session::forget('cart');

        return view('order-success');
    }

    public function order_success()
    {
        if(session()->has('cart') && count(session('cart')) > 0){
            return view('order-success');
        } else {
            return redirect()->back()->with('error', 'No order found.');
        }
    }

    public function faq()
    {

        return view('faq',
            [

            ]
        );
    }

    public function save_contact_form(Request $request)
    {
        $input = $request->all();
        
        $contact = new Form;
        $contact->type = 'Contact Form';
        $contact->name = $input['name'];
        $contact->email = $input['email'];
        $contact->phone = $input['phone'];
        $contact->message = $input['message'];
        $contact->save();

        return redirect()->back()->with('success', 'Contact Form Submitted Successfully!');
    }

    public function add_to_cart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        // $price = $request->input('price');

        if (!$productId) {
            return response()->json([
                'message' => 'Missing product ID',
            ], 400);
        }

        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }

        $cartItem = [
            'id' => $productId,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'image' => optional($product->documentTitle)->encoded_name ?? 'default.jpg',
        ];

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = $cartItem;
        }

        Session::put('cart', $cart);
        Cache::put('cart', $cart, now()->addMinutes(60));

        if (!function_exists('getCartCount')) {
            function getCartCount() {
                return count(Session::get('cart', []));
            }
        }

        return response()->json([
            'message' => 'Item added to cart',
            'cartCount' => getCartCount(),
        ]);
    }

    public function updateCartQuantities(Request $request)
    {
        $cart = session()->get('cart', []);
        $itemId = $request->input('id');
        $quantity = $request->input('quantity');

        if (isset($cart[$itemId])) 
        {
            $cart[$itemId]['quantity'] = $quantity;
            session()->put('cart', $cart);

            $itemSubtotal = $cart[$itemId]['price'] * $cart[$itemId]['quantity'];
            $subtotal = array_reduce($cart, function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0);

            return response()->json([
                'status' => 'success',
                'itemSubtotal' => $itemSubtotal,
                'subtotal' => $subtotal,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Item not found in cart.',
        ]);
    }

    public function add_to_wishlist(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add items to your wishlist.'
            ], 401);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $userId = auth()->id();
        $productId = $request->product_id;

        try {

            $wishlistExists = DB::table('wishlists')
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->exists();

            if ($wishlistExists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product is already in your wishlist.'
                ]);
            }

            DB::table('wishlists')->insert([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product added to wishlist!'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Unable to add to wishlist. Please try again later.',
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }

    public function accountPage()
    {
        $user = Auth::user();
        $orders = Orders::where('user_id', Auth::user()->id)->latest()->take(5)->get();

        print_r($orders); exit;

        return view('user.account', compact('user', 'orders'));
    }

}
