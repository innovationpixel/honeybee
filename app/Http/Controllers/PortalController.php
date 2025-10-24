<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Form;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductTag;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Mail\Subscribe;
use App\Mail\Contact;

class PortalController extends Controller
{
    public function dashboard()
    {
        $products   = Product::where('deleted', 0)->count();
        $pending    = Order::where('status', 'Pending')->count();
        $inprogress = Order::where('status', 'Order Processing')->count();
        $delivered  = Order::where('status', 'Delivered')->count();
        $cancelled  = Order::where('status', 'Cancelled')->count();
        $orders     = Order::count();

        return view('Portal/dashboard', compact('products','pending','inprogress','delivered','cancelled','orders') );
    }





    // PRODUCTS
    public function add_product()
    {
        $categories = Category::where('deleted', 0)->get();
        $sub_categories = SubCategory::where('deleted', 0)->get();

        return view('Portal/add-product', compact('categories', 'sub_categories'));
    }
    public function getSubCategories($id)
    {
        $subCategories = SubCategory::where('category_id', $id)->get(['id', 'name']);
        return response()->json($subCategories);
    }
    public function save_product(Request $request)
    {
        $input = $request->all();

        if (!empty($input) && !empty($input['product_name'])) {

            $product = new Product();
            $product->category_id = $input['category_id'];
            $product->sub_category_id = $input['sub_category_id'];
            $product->name = $input['product_name'];
            $product->description = $input['short_description'];
            $product->url = $input['url'];
            $product->weight = $input['weight'] ?? '';
            $product->price = $input['price'] ?? 0;
            $product->discounted_price = $input['discounted_price'] ?? 0;
            $product->save();

            $product_id = $product->id;

            if ($request->hasFile('images'))
            {
                $images = $request->file('images');

                if (!is_array($images))
                {
                    $images = [$images];
                }

                foreach ($images as $key => $image)
                {
                    $original_name = $image->getClientOriginalName();
                    $file_name = pathinfo($original_name, PATHINFO_FILENAME);
                    $file_extension = $image->getClientOriginalExtension();
                    $digits = 3;
                    $rand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                    $file_name = $file_name . '_' . $rand . '-' . strtotime("now") . '.' . $file_extension;

                    $image->storeAs('public/products', $file_name);

                    $document = new Document();
                    $document->belong_id = $product->id;
                    $document->belong_name = 'product';
                    $document->original_name = $original_name;
                    $document->encoded_name = $file_name;
                    if( $key == 0)
                    {
                        $document->title = 1;
                    }
                    $document->save();
                }
                
            }

            return redirect()->route('products-list')->with('success', 'Product has been added successfully!');
        }
    }
    public function view_product($id)
    {
        $product_id = Crypt::decryptString($id);

        $product = Product::where('id', $product_id)->where('deleted', 0)->first();
        
        $categories = Category::where('deleted', 0)->get();
        
        $sub_categories = SubCategory::where('deleted', 0)->get();

        return view('Portal/view-product', compact('product', 'categories', 'sub_categories', 'id'));
    }
    public function edit_product($id)
    {
        $product_id = Crypt::decryptString($id);

        $product = Product::where('id', $product_id)->where('deleted', 0)->first();
        
        $categories = Category::where('deleted', 0)->get();
        
        $sub_categories = SubCategory::where('deleted', 0)->get();

        return view('Portal/edit-product', compact('product', 'categories', 'sub_categories', 'id'));
    }
    public function update_product(Request $request)
    {
        $formData = json_decode($request->input('data'), true);

        $input = $request->all();

        $product_id = Crypt::decryptString($request->input('product_id'));
        $product = Product::find($product_id);

        if ($product) 
        {
            $product->category_id = $request->input('category_id');
            $product->sub_category_id = $request->input('sub_category_id');
            $product->name = $request->input('product_name');
            $product->description = $request->input('short_description');
            $product->url = $request->input('url');
            $product->weight = $request->input('weight');
            $product->price = $request->input('price');
            $product->discounted_price = $request->input('discounted_price') ?? 0;
            $product->save();

            if ($request->hasFile('dropzone_images'))
            {
                foreach ($request->file('dropzone_images') as $image)
                {
                    if ($image->getClientOriginalName() != 'blob')
                    {
                        $file_name = time() . '-' . $image->getClientOriginalName();
                        $image->storeAs('public/products', $file_name);

                        $document = new Document();
                        $document->belong_id = $product->id;
                        $document->belong_name = 'product';
                        $document->original_name = $image->getClientOriginalName();
                        $document->encoded_name = $file_name;
                        $document->save();
                    }
                }
            }

            if (!empty($request->input('removed_files'))) 
            {
                $removed_files = json_decode($request->input('removed_files'));

                foreach ($removed_files as $key => $value) {
                    $split = explode('_', $value);

                    $file_id = isset($split[0]) ? intval($split[0]) : null;

                    if ($file_id) {

                        DB::table('documents')
                            ->where('id', $file_id)
                            ->update(['deleted' => 1]);

                        $belong_id = DB::table('documents')
                            ->where('id', $file_id)
                            ->value('belong_id');

                        if ($belong_id) {

                            $was_title_1 = DB::table('documents')
                                ->where('id', $file_id)
                                ->value('title') == 1;

                            if ($was_title_1) {

                                $next_picture = DB::table('documents')
                                    ->where('belong_id', $belong_id)
                                    ->where('deleted', 0)
                                    ->orderBy('id', 'asc')
                                    ->first();

                                if ($next_picture) {
                                    DB::table('documents')
                                        ->where('id', $next_picture->id)
                                        ->update(['title' => 1]);
                                }
                            }
                        }
                    }
                }
            }

            return redirect()->route('products-list')->with('success', 'Product has been updated successfully!');

        } else {

            return redirect()->route('edit-product', Crypt::encryptString($product_id))->with('error', 'Product not found!');
        }
    }
    public function deleteProduct($id)
    {
        $product_id = Crypt::decryptString($id);

        if($product_id)
        {
            $product = Product::find($product_id);

            if ($product) 
            {
                $product->deleted = 1;
                $product->save();

                return redirect()->route('products-list')->with('success', 'Product has been deleted successfully!');;
            }

            return redirect()->route('products-list')->with('success', 'Product has been deleted successfully!');;
        }
    }
    public function product_hide($id)
    {
        $product_id = Crypt::decryptString($id);

        if($product_id)
        {
            $product = Product::find($product_id);

            if ($product) {
                $product->hide = 1;
                $product->save();

                return redirect()->route('products-list')->with('success', 'Product has been hide successfully!');
            }

            return redirect()->route('products-list')->with('success', 'Product has been hide successfully!');
        }
    }
    public function product_unhide($id)
    {
        $product_id = Crypt::decryptString($id);

        if($product_id)
        {
            $product = Product::find($product_id);

            if ($product) {
                $product->hide = 0;
                $product->save();

                return redirect()->route('products-list')->with('success', 'Product has been unhide successfully!');
            }

            return redirect()->route('products-list')->with('success', 'Product has been unhide successfully!');
        }
    }
    public function products_list()
    {
        $products = Product::latest()->get();

        return view('Portal/products-list', compact('products'));
    }
    public function product_images($id)
    {
        $product_id = Crypt::decryptString($id);

        if($product_id)
        {
            $product = Product::find($product_id);

            return view('Portal/product-images', compact('product', 'id'));
        }
    }
    public function saveProductImages(Request $request)
    {
        $belongId = $request->input('product_id');
        $product_id = Crypt::decryptString($belongId);

        $request->validate([
            'title_image' => 'required|integer|exists:documents,id'
        ]);

        $document_old_title = Document::where('belong_id', $product_id)->where('title', 1)->first();
        if ($document_old_title) {

            $document_old_title->title = 0;
            $document_old_title->save();
        }

        $document_old_second_title = Document::where('belong_id', $product_id)->where('second_title', 1)->first();
        if ($document_old_second_title) {

            $document_old_second_title->second_title = 0;
            $document_old_second_title->save();
        }

        $document_title = Document::where('belong_id', $product_id)->where('id', $request->input('title_image'))->first();
        if ($document_title) {

            $document_title->title = 1;
            $document_title->save();
        }

        $document_second_title = Document::where('belong_id', $product_id)->where('id', $request->input('secondary_image'))->first();
        if ($document_second_title) {

            $document_second_title->second_title = 1;
            $document_second_title->save();
        }

        return redirect()->route('products-list')->with('success', 'Product Images Placement has been updated successfully!');
    }







    // BLOGS
    public function add_blog()
    {

        return view('Portal/add-blog');
    }
    public function blog_image_upload(Request $request )
    {
        /*if( !Auth::check() )
        {
            header("HTTP/1.1 500 Server Error");
        }*/
        echo "test";
        exit;
        if( $request->isMethod('post') && !empty( $request->file ) )
        {
            $image = $request->file;
            $orignal_name = $image->getClientOriginalName();
            $file_name = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();

            $ext_pos = strpos($file_name, $file_extension);
            $file_name = substr($file_name, 0, $ext_pos - 1 );

            $digits = 3;
            $rand = rand(pow(10, $digits-1), pow(10, $digits)-1);

            $file_name = $file_name.'_'.$rand.'-'.strtotime("now").'.'.$file_extension;
            $image->storeAs('public/blog', $file_name );

            echo json_encode(array('location' => URL::to('/').'/public/storage/blog/' . $file_name));

        }else {

            // Notify editor that the upload failed
            // header("HTTP/1.1 500 Server Error");
        }
    }
    public function save_blog(Request $request)
    {
        $input = $request->all();
        if($request->isMethod('POST') && !empty($input) && isset($input) && !empty($input['title']) && !empty($input['blog_description']) && !empty($input['url']))
        {
            $blog = new Blog;
            $blog->title = !empty($input['title']) ? $input['title'] : '';
            $blog->description = !empty($input['blog_description'])? $input['blog_description'] : '';
            $blog->url = !empty($input['url']) ? $input['url'] : '';
            $blog->image_alt_text = !empty($input['image_alt_text']) ? $input['image_alt_text'] : '';

            if( !empty( $request->blog_image ) )
            {
                $image = $request->blog_image;
                $orignal_name = $image->getClientOriginalName();
                $file_name = $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();

                $ext_pos = strpos($file_name, $file_extension);
                $file_name = substr($file_name, 0, $ext_pos - 1 );

                $digits = 3;
                $rand = rand(pow(10, $digits-1), pow(10, $digits)-1);

                $file_name = $file_name.'_'.$rand.'-'.strtotime("now").'.'.$file_extension;
                $image->storeAs('public/blog', $file_name );

                $blog->original_file_name = $orignal_name;
                $blog->encoded_file_name = $file_name;

            }

            $blog->save();

            return redirect()->route('blogs-list')->with('success', 'Blog has been added successfully!');
        }
        else
        {
            return redirect()->route('add-blog')->with('error', 'Please fill all the fields!');
        }
    }
    public function blogs_list()
    {
        $blogs = Blog::latest()->get();
        return view('Portal/blogs-list',['blogs' => $blogs]);
    }
    public function edit_blog($id)
    {

        $blog_id = Crypt::decryptString($id);
        if( !empty($blog_id) )
        {
            $blogs = Blog::find($blog_id);
            return view('Portal/edit-blog',['blog' => $blogs]);
        }
    }
    public function update_blog(Request $request)
    {
        $input = $request->all();
        if($request->isMethod('POST') && !empty($input) && isset($input) && !empty($input['title']) && !empty($input['blog_description']) && !empty($input['url']))
        {
            $blog =Blog::find($input['blog_id']);
            $blog->title = !empty($input['title']) ? $input['title'] : '';
            $blog->description = !empty($input['blog_description'])? $input['blog_description'] : '';
            $blog->url = !empty($input['url']) ? $input['url'] : '';
            $blog->image_alt_text = !empty($input['image_alt_text']) ? $input['image_alt_text'] : '';

            if( !empty( $request->blog_image ) )
            {
                $image = $request->blog_image;
                $orignal_name = $image->getClientOriginalName();
                $file_name = $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();

                $ext_pos = strpos($file_name, $file_extension);
                $file_name = substr($file_name, 0, $ext_pos - 1 );

                $digits = 3;
                $rand = rand(pow(10, $digits-1), pow(10, $digits)-1);

                $file_name = $file_name.'_'.$rand.'-'.strtotime("now").'.'.$file_extension;
                $image->storeAs('public/blog', $file_name );

                $blog->original_file_name = $orignal_name;
                $blog->encoded_file_name = $file_name;

            }

            $blog->save();

            return redirect()->route('blogs-list')->with('success', 'Blog has been added successfully!');
        }
        else
        {
            return redirect()->route('edit-blog',Crypt::encryptString($input['blog_id']))->with('error', 'Please fill all the fields!');
        }
        // return view('Portal/blogs-list',['blogs' => $blogs]);
    }





    // CATEGORIES
    public function add_category()
    {

        return view('Portal/add-category');
    }
    public function save_category(Request $request)
    {
        $input = $request->all();

        if($request->isMethod('POST') && !empty($input) && isset($input) && !empty($input['name']) )
        {
            $category = new Category;
            $category->name = !empty($input['name']) ? $input['name'] : '';
            // $category->icon = !empty($input['icon']) ? $input['icon'] : '';
            $category->save();

            return redirect()->route('categories-list')->with('success', 'Category has been added successfully!');
        }
    }
    public function categories_list()
    {
        $categories = Category::where('deleted', 0)->latest()->get();

        return view('Portal/categories-list', compact('categories'));
    }
    public function edit_category($id)
    {
        if( !empty($id) )
        {
            $category_id = Crypt::decryptString($id);
            $category = Category::find($category_id);

            if($category)
            {
                return view('Portal/edit-category', compact('category', 'id'));
            }
        }
    }
    public function update_category(Request $request)
    {
        $input = $request->all();

        if($request->isMethod('POST') && !empty($input['category_id']) && !empty($input['name']) )
        {
            $id = Crypt::decryptString($input['category_id']);
            $category = Category::find($id);
            $category->name = !empty($input['name']) ? $input['name'] : '';
            // $category->icon = !empty($input['icon']) ? $input['icon'] : '';
            $category->save();

            return redirect()->route('categories-list')->with('success', 'Category has been added successfully!');
        }
    }
    public function delete_category($id)
    {
        if (Auth::check()) {
            if (!empty($id)) {
                $category_id = Crypt::decryptString($id);
                $category = Category::find($category_id);
                if ($category) {
                    $category->deleted = 1;
                    $category->save();
                }
                return redirect()->route('categories-list')->with('success', 'Category has been deleted successfully!');
            }
        }
    }





    // ORDERS & CUSTOMERS
    public function orders_list()
    {
        if(Auth::check())
        {
            $orders = Order::latest()->get();

            $orderStatuses = OrderStatus::all();

            return view('Portal/orders-list',
                [
                    'orders' => $orders,
                    'orderStatuses' => $orderStatuses
                ]
            );

        } else {

            return redirect()->route('login');
        }
    }
    public function view_customer($id)
    {
        if(Auth::check())
        {
            $customer_id = Crypt::decryptString($id);

            $customer = Customer::where('id', $customer_id)->first();

            return view('Portal/view-customer' , ['customer' => $customer]);
        }
    }
    public function view_order_detail($id)
    {
        if(Auth::check())
        {
            $order_id = Crypt::decryptString($id);

            $order = Order::where('orders.id', '=', $order_id)->first();

            return view('Portal/view-order-details', compact('order'));
        }
    }
    public function customers_list()
    {
        if(Auth::check())
        {
            $customers = DB::table('customers')
                ->select('customers.*')
                ->latest()
                ->get();

            return view('Portal/customers-list',['customers' => $customers]);

        }
    }
    public function change_order_status(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|string',
        ]);

        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();

        return response()->json(['message' => 'Order status updated successfully.']);
    }
    public function add_tag_category()
    {

        return view('Portal/add-tag-category');
    }
    public function save_tag_category(Request $request)
    {
        $input = $request->all();

        if($request->isMethod('POST') && !empty($input) && isset($input) && !empty($input['name']))
        {
            $category = new TagCategory;
            $category->name = !empty($input['name']) ? $input['name'] : '';
            // $category->url = !empty($input['url']) ? $input['url'] : '';
            $category->save();

            return redirect()->route('product-categories-list')->with('success', 'Category has been added successfully!');
        }
    }





    // TAGS
    public function product_categories_list()
    {
        if(Auth::check())
        {
            $categories = TagCategory::all()->where('deleted', 0);

            return view('Portal/product-categories-list', compact('categories'));
        }
    }
    public function add_sub_category()
    {
        if(Auth::check())
        {
            $categories = Category::where('deleted', 0)->get();
            return view('Portal/add-sub-category', compact('categories'));
        }
    }
    public function save_sub_category(Request $request)
    {
        $input = $request->all();

        if ($request->isMethod('POST') && !empty($input) && isset($input['name'])) {

            if (!empty($input['name']) && !empty($input['category_id'])) {
                $category = new SubCategory;
                $category->category_id = $input['category_id'];
                $category->name = $input['name'];
                $category->save();
            }

            return redirect()->route('sub-categories-list')->with('success', 'Sub Category has been added successfully!');
        }


        return redirect()->back()->with('error', 'Invalid data provided.');
    }
    public function sub_categories_list()
    {
        if(Auth::check())
        {
            $sub_categories = SubCategory::where('deleted', 0)->latest()->get();

            return view('Portal/sub-categories-list', compact('sub_categories'));
        }
    }
    public function delete_sub_category($id)
    {
        if (Auth::check()) {
            if (!empty($id)) {
                $category = SubCategory::find($id);
                if ($category) {
                    $category->deleted = 1;
                    $category->save();
                }
                return redirect()->route('sub-categories-list')->with('success', 'Sub Category has been deleted successfully!');
            }
        }
    }





    // LEADS
    public function leads_list()
    {
        if(Auth::check())
        {
            $leads = DB::table('forms')
                ->select('forms.*')
                ->where('deleted', 0)
                ->latest()
                ->get();

            return view('Portal/leads-list',['leads' => $leads]);

        }
    }
    public function view_lead($id)
    {
        if(Auth::check())
        {
            $lead_id = Crypt::decryptString($id);

            $lead = Form::where('id', $lead_id)->first();

            return view('Portal/view-lead' , ['lead' => $lead]);
        }
    }
    public function delete_lead($id)
    {
        if (Auth::check()) {
            if (!empty($id)) {
                $category = Form::find($id);
                if ($category) {
                    $category->deleted = 1;
                    $category->save();
                }
                return redirect()->route('leads-list')->with('success', 'Lead has been deleted successfully!');
            }
        }
    }
}
