<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories=Category::when($request->search,function($q) use($request){
        return $q->whereTranslationLike('name','%'.$request->search.'%');
        })->latest()->paginate(5);
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
        
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
            'ar.*'=>'required|unique:category_translations,name',
            'ar.*'=>'required|unique:category_translations,description',
            'en.*'=>'required|unique:category_translations,name',
            'en.*'=>'required|unique:category_translations,description',
        ]);

        $request_data=$request->all();

        if($request->image){
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/categories_images/'. $request->image->hashName()));
            $request_data['image']=$request->image->hashName();
        }

        Category::create($request_data);

        session()->flash('success',__('site.added_succefully'));
        
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'ar.*'=>'required',
            'ar.*'=>'required',
            'en.*'=>'required',
            'en.*'=>'required',
        ]);

        $request_data=$request->all();

        if($request->image){
            if($category->image !='default.jpg'){
                Storage::disk('public_uploads')->delete('/categories_images/' .$category->image);
                Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                })->save(public_path('uploads/categories_images/'. $request->image->hashName()));
            }

            $request_data['image']=$request->image->hashName(); 
        }

        $category->update($request_data);

        session()->flash('success',__('site.updated_succefully'));
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image !='default.jpg'){
            Storage::disk('public_uploads')->delete('/categories_images/' .$category->image);
        }
        $category->delete();
        session()->flash('success',__('site.deleted_succefully'));
        return redirect()->route('dashboard.categories.index');

    }
}
