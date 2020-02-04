<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    //
   protected $table='resultats';
     protected $fillable=['numinscrit','nom','prenom','soum','specilaite','moy_sun','res_sun','moy_ratt','res_ratt'];
}
