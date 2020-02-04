<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Modulespecial extends Model

{
      protected $table='specialmodules';
      protected $fillable=['module', 'soum_id', 'special', 'volh', 'coef','noteelimin' ];
}
