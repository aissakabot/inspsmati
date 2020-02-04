<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neww extends Model
{
    //
    protected $table='news';
    protected $fillable=['titre', 'sujet', 'image', 'video','keywordnews', 'pub'];
}
