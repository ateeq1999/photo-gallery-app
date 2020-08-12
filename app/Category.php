<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use \Astrotomic\Translatable\Translatable;

    protected $guarded= [];
    public $translatedAttributes = ['name', 'description'];
    protected $appends=['image_path'];

    public function getImagePathAttribute(){
        return asset('uploads/categories_images/'.$this->image);
    }
    
    public function products(){
        return $this->hasMany('App\Product');
    }
    
    public function getNameAttribute($value){
        return ucfirst($value);
    }
}
