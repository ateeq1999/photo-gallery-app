<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Client;
use App\Product;
use App\Profile;
use App\Setting;
use App\Info;
use App\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::all();
        $categories = Category::all();
        
        return view('site.pages.home', compact('categories','clients'));
    }

    public function category_products(Category $category)
    {
        $products = $category->products()->paginate(10);
        
        return view('site.pages.category_products', compact('category','products'));
    }

    public function category_product_show(Product $product)
    {
        return view('site.pages.category_product_show', compact('product'));
    }

    public function profile()
    {
        $profile = Profile::first()->load('settings');
        $categories = Category::all();

        return view('site.pages.profile', compact('categories','profile'));
    }

    public function clients()
    {
        $clients = Client::paginate(8);
        $categories = Category::all();

        return view('site.pages.clients', compact('categories','clients'));
    }

    public function contact_us()
    {
        $info = Info::first();
        // dd($info->locations);
        
        $awards = [];

        return view('site.pages.contact-us', compact('info'));
    }
    public function contact_us_store(Request $request)
    {
        dd($request->all());
        $info = Info::first();
        // dd($info->locations);
        
        $awards = [];

        return view('site.pages.contact-us', compact('info'));
    }
}
