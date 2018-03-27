<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicite extends Model
{
    protected $table = "publicites";
    protected $fillable = ['numpub','statut','description','contenu','url'];
}
