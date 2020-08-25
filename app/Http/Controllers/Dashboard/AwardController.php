<?php

namespace App\Http\Controllers\Dashboard;

use App\Award;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $awards=Award::when($request->search,function($q) use($request){
        return $q->whereTranslationLike('name','%'.$request->search.'%');
        })->latest()->paginate(5);
        return view('dashboard.awards.index',compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.awards.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data=$request->all();

        if($request->image){
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/awards_images/'. $request->image->hashName()));
            $request_data['image']=$request->image->hashName();
        }

        Award::create($request_data);

        session()->flash('success',__('site.added_succefully'));
        
        return redirect()->route('dashboard.awards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        return view('dashboard.awards.edit',compact('award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $request_data=$request->all();

        if($request->image){
            if($award->image !='default.jpg'){
                Storage::disk('public_uploads')->delete('/awards_images/' .$award->image);
                Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                })->save(public_path('uploads/awards_images/'. $request->image->hashName()));
            }
            $request_data['image']=$request->image->hashName(); 
        }

        $award->update($request_data);

        session()->flash('success',__('site.updated_succefully'));
        return redirect()->route('dashboard.awards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        if($award->image !='default.jpg'){
            Storage::disk('public_uploads')->delete('/awards_images/' .$award->image);
        }
        $award->delete();
        session()->flash('success',__('site.deleted_succefully'));
        return redirect()->route('dashboard.awards.index');

    }
}
