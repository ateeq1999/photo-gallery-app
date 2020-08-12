<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded= [];
    protected $appends=['image_path'];
    
    protected $casts=[
      'phone'=>'array'
    ];

    public function getImagePathAttribute(){
      return asset('uploads/clients_images/'.$this->image);
    }

    public function orders()
    {
     return $this->hasMany('App\Order');
    }
    public function getNameAttribute($value){
      return ucfirst($value);
  }
    
}
