<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use \Astrotomic\Translatable\Translatable;
    
    protected $guarded= [];
    public $translatedAttributes = ['name', 'address'];

    public function info(){
        return $this->belongsTo('App\Info');
    }

}
