<?php

namespace App\Http\Controllers\Dashboard;

use App\Location;
use App\Info;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $infos=Info::all();
        $locations=Location::when($request->search,function($q) use($request){
            return $q->whereTranslationLike('name','%'. $request->search .'%');
        })->when($request->info_id,function($q) use($request){
            return $q->where('info_id',$request->info_id);

        })->latest()->paginate(3);
        return view('dashboard.locations.index',compact('infos','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infos=Info::all();
        return view('dashboard.locations.create',compact('infos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'info_id'=>'required'
        ];

        foreach (config('translatable.locales') as $locale){
            $rules +=[$locale. '.name'=>'required'];
            $rules +=[$locale. '.address'=>'required'];
        }
    
        $rules+=[
            'fax'=>'required',
            'phone'=>'required',
            'map'=>'required',
            'email'=>'required'
        ];

        $request->validate($rules);

        $request_data=$request->all();

        Location::create($request_data);

        session()->flash('success',__('site.added_succefully'));
        return redirect()->route('dashboard.locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $infos=Info::all();
        return view('dashboard.locations.edit',compact('infos','location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $rules=[
            'info_id'=>'required'
        ];
        foreach (config('translatable.locales') as $locale){
            $rules +=[$locale. '.name'=>'required'];
            $rules +=[$locale. '.address'=>'required'];
        }
    
        $rules+=[
            'fax'=>'required',
            'phone'=>'required',
            'map'=>'required',
            'email'=>'required'

        ];
       $request->validate($rules);
       $request_data=$request->all();

       if($request->image){
           if($location->image !='default.jpg'){
            Storage::disk('public_uploads')->delete('/locatins_images/' .$location->image);
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/locatins_images/'. $request->image->hashName()));
        }
            $request_data['image']=$request->image->hashName(); 
       }
        $location->update($request_data);
       session()->flash('success',__('site.updated_succefully'));
       return redirect()->route('dashboard.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        session()->flash('success',__('site.deleted_succefully'));
        return redirect()->route('dashboard.locations.index');
    }
}
