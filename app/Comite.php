<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    //
     protected $table='comites';
    protected $fillable=['libelle', 'descrip', 'datedebut', 'datefin', 'image', 'membres'];
}
