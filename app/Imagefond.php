<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagefond extends Model
{
    protected $table = "imagefonds";
    protected $fillable = ['description','numpub','numfond','statut','url'];
}
