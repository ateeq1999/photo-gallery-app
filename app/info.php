<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    use \Astrotomic\Translatable\Translatable;

    protected $guarded= [];
    public $translatedAttributes = ['bio', 'description'];

    public function locations(){
        return $this->hasMany('App\Location');
    }
}
