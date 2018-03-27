<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;
use App\Poule;

class EquipesController extends Controller
{
    public $equipe;
    public $poule;
    public $score;

    public function __construct($idequipe=null)
    {
    	$instance = new Equipe();
    	if( !empty($idequipe) )
    		$this->equipe =  $instance->getinfoequipebyid($idequipe);
    	else
    		$this->equipe = Equipe::all();
    }

    /**
    * Fonction get object by Equipe
    * @param Instance Object EquipeController
    * @return Object 
    */
    public function convertToObject()
    {
        $resultat = $this->equipe;
        foreach($resultat as $res)
        {
            $object['nom'] = $resultat->NAME;
            $object['logo'] = $resultat->LOGOURL;
            $object['genre'] = $resultat->SEXE;
            $object['sigle'] = $resultat->SIGLE;
            $object['region'] = $resultat->region;
            $object['categorie'] = $resultat->categorie;
            if( !empty($resultat->score) )
                $object['score'] = $resultat->score;
        }
        return json_decode(json_encode($object));
    }

}	
