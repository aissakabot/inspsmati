<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actuelspecial extends Model
{
    //
    protected $fillable=['intitule', 'datedebut', 'datefin', 'professeur', 'image', 'nbstag', 'descrip', 'diplome', 'type', 'soumestre'];
}
