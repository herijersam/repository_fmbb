<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poule;
use App\Equipe;

class PoulesController extends Controller
{
    private $poule;
    private $equipe;

    public function __construct()
    {
    	$this->poule = new Poule();
    	$this->equipe = new Equipe();
    }

    /** 
    * fonction verification des poules 
    * @param integer equipe_id1 , integer equipe_id2
    * @return Collection Object Equipes
    */
    public function verificationpouleequipe(Request $request)
    {
    	 $verifyequipe = $this->poule->verifyequipepoule( $request->get('equipe_id1') , $request->get('equipe_id2') );
    	 if( !empty($verifyequipe) && count($verifyequipe) == 1 )
    	 {
    	 	return $verifyequipe->IDPOULE;
    	 }
    	 else
    	 {
    	 	return false;
    	 }
    	 	
    }
}
