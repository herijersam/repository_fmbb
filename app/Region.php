<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['idregion','libelle'];

 	/**
 	* Fonction get information d'une region par idregion
 	* @param integer idregion
 	* @return Collection Object Region
 	*/
 	public function getregion($idregion=null)
 	{
 		if( !is_null($idregion) )
 			return self::where('idregion',$idregion)->first();
 		else
 			return self::all();
 	} 

 	/**
 	* getters and setters 
 	*/
 	public function getLibelleAttribute($value)
 	{
 		if( empty($value) )
 			return 'Madagascar MG';
 		else
 			return $value. ', Madagascar MG' ;
 	}
}
