<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;
use App\Resultat;
use App\Match;
use Session;

class ClassementsController extends Controller
{
	protected $point;
	protected $result;

    public function __construct()
    {
    	$this->result = new Resultat();
    	$this->point = new Point();
    	$this->match = new Match();
    }

    /**
    * fonction verification et insertion dans classement des équipes
    * @param Array $idequipes , Array $score
    * @return Boolean 
    */
    public function insertionClassement($idequipes,$idpoule,$idmatch,$score)
    {
    	for( $a=0; $a<count($idequipes); $a++ )
    	{
    		$designationScore = $this->classificationScore($idequipes[$a],$score);
	    	$resultat =  $this->result->getresultat($idequipes[$a], $idpoule);
	    	if( $resultat == false )
	    	{
	    		$this->result->insertResultat([
	    			'idequipe' => $idequipes[$a],
	    			'pouleid' => $idpoule,
	    			'v' => intval(00),
	    			'd' => intval(00),
	    			'points' => intval(00),
	    			'scoreencaisse' => $designationScore['encaisse'],
	    			'scorecumule' => $designationScore['cumule'],
	    			'differencepoint' => $designationScore['differencepoint']
	    		]);
	    	}
	    	else
	    	{
	    		$match_statut = $this->match->getmatchbyid($idmatch)->STATUT;
	    		if( $match_statut != 'Terminer')
	    		{	
		    		$assignation_statut = $this->calculdespoints($score,$idpoule);
		    		break;
	    		}
	    	}
    	}
    	return true;
    }

    /**
    * fonction calcul des points et victoires ainsi que défaites 
    * @param Array $score, integer $idpoule
    * @return boolean true
    */
    public function calculdespoints(array $score, $idpoule)
    {
    	foreach ($score as $key => $value)
    	{
    		$equipe1 = array('id' => $key , 'score' => $value);
    		$equipe1Object = json_decode(json_encode($equipe1),false);
    		break;
    	}
    	foreach ($score as $cle => $valeur)
    	{
    		if( $cle != $equipe1['id'] ){
    			$equipe2 = array('id' => $cle, 'score' => $valeur );
    			$equipe2Object = json_decode(json_encode($equipe2),false);
    		}
    	}

    	if( $equipe1Object->score > $equipe2Object->score)
    		$updateScore = $this->updateVictoireOuDefaite($equipe1Object,$equipe2Object,$idpoule);
    	if( $equipe1Object->score < $equipe2Object->score)
    		$updateScore = $this->updateVictoireOuDefaite($equipe2Object,$equipe1Object,$idpoule);
    	

    	return true;
    }

    /**
    * fonction insertion victoire ou defaite d'une équipe
    * @param Object $idequipe victoire , Object $idequipe Defaite, integer $idpoule
    * @return boolean true
    */
    public function updateVictoireOuDefaite($equipeVictoire,$equipeDefaite,$idpoule)
    {
    	//getresultat Equipe Victorieux :  victoire, defaite, points, scoreencaisse, scorecumule, differencepoint
    	$dataScore = $this->result->recupereResultat($equipeVictoire->id,$idpoule);

    	foreach ($dataScore as $datas )
    	{
    		$getV = $datas->v;
    		$getD = $datas->d;
    		$getPoints = $datas->points;
    		$getEncaisse = $datas->scoreencaisse;
    		$getCumule = $datas->scorecumule;
    		$getDifference = $datas->differencepoint;
    	}
    	$updateQueryData = [
    		'v' => intval($getV) + 1,
    		'points' => intval($getPoints) + 3,
    		'scoreencaisse' => $equipeDefaite->score,
    		'scorecumule' => $equipeVictoire->score,
    		'differencepoint' => intval($equipeVictoire->score) - intval($equipeDefaite->score) 
    	];
    	
    	$this->result->updateResultat($equipeVictoire->id, $idpoule, $updateQueryData);

    	//getresultat Equipe Defaite 
    	$dataDefaite = $this->result->recupereResultat($equipeDefaite->id,$idpoule);
    	foreach ($dataDefaite as $defaite)
    	{
    		$getV = $defaite->v;
    		$getD = $defaite->d;
    		$getPoints = $defaite->points;
    		$getEncaisse = $defaite->scoreencaisse;
    		$getCumule = $defaite->scorecumule;
    		$getDifference = $defaite->differencepoint;
    	}
    	$updateQueryDefaite = [
    		'd' => intval($getV) + 1,
    		'points' => intval($getPoints) + 1,
    		'scoreencaisse' => $equipeVictoire->score,
    		'scorecumule' => $equipeDefaite->score,
    		'differencepoint' => intval($equipeDefaite->score) - intval($equipeVictoire->score)
    	];

    	$this->result->updateResultat($equipeDefaite->id, $idpoule, $updateQueryDefaite);
    	return true;
    }
    /** 
    * fonction affichage des positionnements par Poule
    * @param integer idpoule
    * @return Collection Object Resultat
    */
    public function positionnementsClassement($idpoule)
    {
    	$classement_poule = $this->result->getResultatByPoule($idpoule);
        $positionnements = $this->gestionDesRangs($classement_poule);
        return $positionnements;
    }

    /**
    * fonction classification score de deux equipes
    * @param integer idequipe , string requete
    * @return Array
    */
    public function classificationScore($idequipe, array $tableauScore)
    {
    	$score = [];
    	if( array_key_exists($idequipe, $tableauScore) )
    	{
    		$score['cumule'] = $tableauScore[$idequipe];
    	}
    	foreach( $tableauScore as $key => $valeur )
    	{
    		if( $key != $idequipe )
    			$score['encaisse'] = $valeur;
    	}
    	$score['differencepoint'] = $score['cumule'] - $score['encaisse'];
    	return $score;
    }

    /**
    * fonction changement de position Classement 
    * @param Array $classement_poule
    * @return Array $flash_position
    */
    public function gestionDesRangs($rangsObject)
    {
        //dd(\Session::all());
        if( !is_null($rangsObject) )
        {
            foreach ($rangsObject as $key => $value)
            {
               $prime[] = array('id' => $value->idequipe, 'points'=>$value->points);
            }
            $rangs = json_decode(json_encode($rangsObject),true);
          
            if( \Session::has('flash_position') )
            {
                $getters = \Session::get('flash_position');
                for( $r=0; $r<count($rangs); $r++ )
                {
                    if( $rangs[$r]['idequipe'] != $getters[$r]['id'] )
                    {
                        $ancien = $rang[$r]['points'] ;
                        if( (intval($ancien) + 3) == $getters[$r]['points'] )
                            $rangs[$r]['position'] = '<i class="fa fa-caret-up text-success fa-2x">'; //up
                        if( (intval($ancien) + 1) == $getters[$r]['points'])  
                            $rangs[$r]['position'] = '<i class="fa fa-caret-down text-success fa-2x">'; //down
                        else
                             $rangs[$r]['position'] = '<i class="fa fa-caret-up text-success fa-2x">'; //up
                    }
                    else
                        $rangs[$r]['position'] = '<i class="fa fa-caret-up text-success fa-2x">'; //up
                }
                \Session::forget('flash_position');
            }
            else
            {
                for( $c=0; $c<count($rangs); $c++ ) {
                    $rangs[$c]['position'] = '<i class="fa fa-caret-up text-success fa-2x">';
                }
                \Session::put('flash_position',$prime);
            }
        }

        return json_decode(json_encode($rangs),false);
    }

}
