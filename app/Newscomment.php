<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newscomment extends Model
{
   public function user(){
		return $this->belongsTo(User::class, "user_id");
		}
  public function new(){
  return $this->belongsTo(Neww::class, "new_id");
  }

  protected $fillable=['comment','user_id','new_id','activ'];
}
