<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    //
    protected $table='specialites';
    protected $fillable=['type', 'branchep', 'code', 'intitule', 'niveauqual', 'duree', 'volumeh', 'diplome', 'conditionacc', 'modepriv'];
}
