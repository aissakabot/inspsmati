<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitecomment extends Model
{
    public function user(){
		return $this->belongsTo(User::class, "user_id");
		}
  public function activite(){
  return $this->belongsTo(Activite::class, "activite_id");
  }

  protected $fillable=['comment','user_id','activite_id','activ'];
}
