<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siteSetting extends Model
{
    //
    protected $table='sitesettings';
   protected $fillable=['slug','namesetting','value','type'];
}
