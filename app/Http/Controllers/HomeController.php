<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Forms;
use App\Mail\Contact;
use App\Mail\Subscribe;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

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


    public function shop()
    {

        return view('shop',
            [

            ]
        );
    }

    public function shop_detail()
    {

        return view('shop-detail',
            [

            ]
        );
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

    public function checkout()
    {

        return view('checkout',
            [

            ]
        );
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
        
        $contact = new ContactForm;
        $contact->name = $input['name'];
        $contact->email = $input['email'];
        $contact->phone = $input['phone'];
        $contact->message = $input['message'];
        $contact->save();

        return redirect()->route('contact');
    }
}
