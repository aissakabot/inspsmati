<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//Notification for Seller
use App\Notifications\InscritResetPasswordNotification;


class Inscrit extends Authenticatable
{

	use Notifiable;
	protected $guard="inscrit";
	protected $table='inscrits';
    protected $fillable=['nomins', 'prenomins', 'dobins', 'lieuins', 'adrins', 'niveauins', 'tel','email', 'special', 'session','password','numins' ];


    protected $hidden = [
      'password', 'remember_token',
  ];

  //Send password reset notification
  public function sendPasswordResetNotification($token)
  {
      $this->notify(new InscritResetPasswordNotification($token));
  }
}
