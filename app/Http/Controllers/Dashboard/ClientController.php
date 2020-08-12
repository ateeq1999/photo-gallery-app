<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients=Client::when($request->search,function($q) use ($request){

         return $q->where('name','like','%'.$request->search .'%')
         ->orWhere('phone','like','%'.$request->search .'%'); 

        })->latest()->paginate(5);
        return view('dashboard.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clients.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $request_data=$request->all();

        if($request->image){
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/clients_images/'. $request->image->hashName()));
            $request_data['image']=$request->image->hashName();
        }

        Client::create($request_data);

        session()->flash('success',__('site.added_succefully'));
        return redirect()->route('dashboard.clients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.clients.edit',compact('client'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        
        $request_data=$request->all();

        if($request->image){

            if($client->image !='default.jpg'){
                Storage::disk('public_uploads')->delete('/clients_images/' .$client->image);
                Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                })->save(public_path('uploads/clients_images/'. $request->image->hashName()));
            }

            $request_data['image']=$request->image->hashName(); 
        }

        $client->update($request_data);

        session()->flash('success',__('site.updated_succefully'));
        return redirect()->route('dashboard.clients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success',__('site.deleted_succefully'));
        return redirect()->route('dashboard.clients.index');
    }
}
