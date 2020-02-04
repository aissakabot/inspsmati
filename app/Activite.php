<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    //
    protected $table='activites';
     protected $fillable=['title','texte','typeact','image','keywordactivite'];

     public function activitecomment(){
		return $this->hasMany(Activitecomment::class, "activite_id");
		}
}
