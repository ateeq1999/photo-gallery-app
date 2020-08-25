<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $guarded= [];

    protected $appends=['image_path'];

    public function getImagePathAttribute(){
        return asset('uploads/awards_images/'.$this->image);
    }
}
