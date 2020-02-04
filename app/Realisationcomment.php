<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisationcomment extends Model
{
    public function user(){
		return $this->belongsTo(User::class, "user_id");
		}
  public function realisation(){
  return $this->belongsTo(Realisation::class, "realisation_id");
  }

  protected $fillable=['comment','user_id','realisation_id','activ'];
}
