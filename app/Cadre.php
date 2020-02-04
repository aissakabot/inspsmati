<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadre extends Model
{
    //
    protected $table="cadres";
    protected $fillable=[ 'nom', 'prenom', 'prof', 'datenomin', 'image', 'email', 'tel', 'faceb','type'];
}
