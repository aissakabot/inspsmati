<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model

{
	protected $table='modules';
      protected $fillable=['libelle' ,'special_id'];
}
