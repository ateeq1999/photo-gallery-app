<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['bio','description'];
}
