<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','bio'];
}
