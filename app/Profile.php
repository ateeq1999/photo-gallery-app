<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use \Astrotomic\Translatable\Translatable;

    protected $guarded= [];
    public $translatedAttributes = ['title','bio'];
    protected $appends=['image_path'];

    public function getImagePathAttribute(){
        return asset('uploads/profiles_images/'.$this->image);
    }

    public function settings(){
        return $this->hasMany('App\Setting');
    }
}
