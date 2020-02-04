<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    //

  
    protected $table='offres';
    protected $fillable=['codesession','codespecial','typeoffre'];
}
