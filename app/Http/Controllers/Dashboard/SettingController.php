<?php

namespace App\Http\Controllers\Dashboard;

use App\Setting;
use App\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profiles=Profile::all();
        $settings=Setting::when($request->search,function($q) use($request){
            return $q->whereTranslationLike('title','%'. $request->search .'%');
        })->when($request->profile_id,function($q) use($request){
            return $q->where('profile_id',$request->profile_id);

        })->latest()->paginate(3);
        return view('dashboard.settings.index',compact('profiles','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles=Profile::all();
        return view('dashboard.settings.create',compact('profiles'));
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
            'profile_id'=>'required'
        ];

        foreach (config('translatable.locales') as $locale){
            $rules +=[$locale. '.title'=>'required|unique:setting_translations,title'];
            $rules +=[$locale. '.description'=>'required'];
        }
    
        $request->validate($rules);

        $request_data=$request->all();

        Setting::create($request_data);

        session()->flash('success',__('site.added_succefully'));
        return redirect()->route('dashboard.settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $profiles=Profile::all();
        return view('dashboard.settings.edit',compact('profiles','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $rules=[
            'profile_id'=>'required'
        ];
        foreach (config('translatable.locales') as $locale){
            $rules +=[$locale. '.title'=>['required',Rule::unique('setting_translations','title')->ignore($setting->id,'setting_id')]];
            $rules +=[$locale. '.description'=>'required'];
        }
    
       $request->validate($rules);

       $request_data=$request->all();

        $setting->update($request_data);
        session()->flash('success',__('site.updated_succefully'));
        return redirect()->route('dashboard.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        session()->flash('success',__('site.deleted_succefully'));
        return redirect()->route('dashboard.settings.index');
    }
}
