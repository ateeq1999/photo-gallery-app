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
use App\Order;

class HomeController extends Controller
{

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
        
        $awards = [];

        return view('site.pages.contact-us', compact('info'));
    }
    public function contact_us_store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'item_code' => 'required',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => 'sudan',
        ]);

        $client->save();

        $order = Order::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'item_code' => $request->item_code,
            'client_id' => $client->id,
        ]);

        $order->save();

        session()->flash('success',__('site.message_sendded'));

        return redirect()->back();
    }
}
