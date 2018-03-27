<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    protected $fillable = ['libellecategorie'];

    /**
    * Fonction insertion events_categories 
    * @param Array insert
    * @return Collection Object 
    */
    public function insertionRelationshipEventsCategories(array $array)
    {
    	if(is_array($array))
    	{
    			DB::table('events_categories')->insert([
		    		'idevent' => $array['event'],
		    		'idcategorie' => $array['categorie']
    			]);
    			return true;
    	}
    	else
    		return false;
    	
    }

    /**
    * Fonction getcategories IN()
    * @param array In 
    * @return Collection Object Categorie
    */
    public function getcategoriebyIn($arrayIn)
    {
        if(is_array($arrayIn))
        {
            return self::whereIn('id',$arrayIn)->get();
        }
    }

    /**
    * fonction getcategorie by idcategorie
    * @param integer idcategorie
    * @return Collection Object Categorie
    */
    public function getcategoriebyid($idcategorie)
    {
        if( !is_null($idcategorie) )
            return self::find($idcategorie)->first();
    }
}
