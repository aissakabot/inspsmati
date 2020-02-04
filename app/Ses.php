<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ses extends Model
{
    //
    protected $table='sess';
    protected $fillable=['libelle','datedebut'];
}
