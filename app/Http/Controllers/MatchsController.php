<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Match;
use App\Equipe;
use App\Region;
use App\Point;
use App\Event;
use App\Poule;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\ClassementsController;

class MatchsController extends Controller
{
    private $match;
    private $equipe;
    private $region;
    private $point;
    private $classement;
    private $poule;

    public $score;
    public $periode;
    public $demarrage;
    public $affichage = true;

    public function __construct()
    {
        $this->match = new Match();
        $this->equipe = new Equipe();
        $this->region = new Region();
        $this->point = new Point();
        $this->poule = new Poule();
        $this->classement = new ClassementsController();

    }

    /**
    * fonction listes des rencontres par evenement
    * @param integer idevent , string phase 
    * @return lists
    */
    public function showallmatchsbyEvent(Request $request , $phase='phase de groupe')
    {
        $brute = $this->match->getMatchsbyEvents( $request->session()->get('idevent') , $phase );

        if( !empty($phase) )
            $brute->encours = $phase;

        foreach($brute as $brt)
        {
            $brt->teamA =  $this->equipe->findequipe($brt->equipeA);
            $brt->teamA->REGION = $this->region->getregion($brt->teamA->IDREGION)->LIBELLE;
            $brt->teamA->score = $this->point->getlastPoint($brt->idmatch,$brt->teamA->IDEQUIPE);

            $brt->teamB = $this->equipe->findequipe($brt->equipeB);
            $brt->teamB->REGION = $this->region->getregion($brt->teamB->IDREGION)->LIBELLE;
            $brt->teamB->score = $this->point->getlastPoint($brt->idmatch,$brt->teamB->IDEQUIPE);

            $evenement = new Event();
            $brt->statutencours = $evenement->scopeStatutEvent($brt->datematch, $brt->datematch);
        }
        return $brute;
    }

    /** 
    * Fonction main rencontre match 
    * @param integer idmatch
    * @return 0,1,2
    //result 0 : initialiser Match
    //result 1 : start Match
    //result 2 : Match déjà en cours
    */
    public function main($idmatch, $id1, $id2)
    {
        $returnValue = '';
        //initialisation
        $main = $this->initialiserMatch($idmatch);
        if( $main )
            $returnValue = '0';
        elseif( $main == false )
        {
           if( $this->getstart($idmatch) )
                $returnValue = '1';
            else
                $returnValue = '2';
        }
       if( $returnValue == '2')
        {
             $equipeUn = $this->point->getlastPoint($idmatch,$id1);
            $equipeDeux = $this->point->getlastPoint($idmatch,$id2);
            if( !is_null($equipeUn) && !is_null($equipeDeux) )
                $returnValue = array( 'scoreEquipeUn' => $equipeUn , 'scoreEquipeDeux' => $equipeDeux );
        }
        return $returnValue;
    }

    /**
    * Fonction initialiser un match
    * @param null
    * @return null 
    */
    public function initialiserMatch($idmatch)
    {
        $verification = $this->match->getmatchbyid($idmatch);
        if( is_null($verification->IDPOINT) )
        {
            $this->score = '00';
            $this->periode = '<button class="btn btn-default btn-labeled fa fa-thumbs-o-up">Prêt</button>';
            $this->demarrage = ' <a href='. route('admin.declencheur',$idmatch).' class="btn btn-success btn-labeled fa fa-play-circle">Jouer le match</a>';
            $this->affichage = false;
            return true;
        }
        else
            return false;
    }

    /** 
    * Fonction declencheur debut match
    * @param integer idmatch
    * @return array tableau
    */
    public function declencheurMatch(Request $request,$idmatch)
    {
       //creer l'idpoint dans point
        $equipes = $this->match->getmatchbyid($idmatch);
        $idequipes = [ $equipes->EQUIPE_ID1, $equipes->EQUIPE_ID2 ];
        for($i=0 ; $i<count($idequipes); $i++ )
        {
            $insertion = $this->point->createPoint(['idequipe' => $idequipes[$i], 'idmatch' => $idmatch]);
            //mettre à jour l'idpoint dans match
            $update = $this->match->updateMatch($idmatch, ['idpoint' => $insertion->id ]);
        }
        
        return redirect()->route('admin.show-update-match',$idmatch)->with('success','Le match est joué et déclenché dans le système ! ');
    }

    /**
    * Fonction debut du match
    * @param integer idmatch
    * @return 
    */
    public function getstart($idmatch)
    {
        $verifQuartOne = $this->point->getOneQuarts($idmatch,'idmatch');
        if( is_null($verifQuartOne->quart1) ) //->first()
        {
            $this->periode = '<button class="btn btn-primary btn-labeled fa fa-clock-o">Quart temps 1</button>';
            $this->demarrage = '<button class="btn btn-success btn-labeled fa fa-spinner">En cours</button>';
            $this->score = '00';
            return true;
        }
        else
            return false;
    }

    /**
    * Fonction ajout Score
    * @param Request $request
    * @return null
    */
    public function setScore(Request $request)
    {
        $validation = $this->validate($request,[
            'one' => 'required|numeric',
            'two' => 'required|numeric',
            'matchref' => 'required|numeric',
            'scoreTeam1' => 'required|numeric',
            'scoreTeam2' => 'required|numeric'
        ]);

        //get idevent
        $idevent = $request->session()->get('idevent');
        //verifier que superieur ou egal précedent score 
        //listes : id des equipes
        $listes = [ $request->post('one') , $request->post('two') ];
        $periodes = ['quart1','quart2','quart3','quart4'];
        //scores  : score respective des deux equipes
        $scores = [ $request->post('scoreTeam1') , $request->post('scoreTeam2') ];

        $scorepoint = Point::where('idequipe', $request->post('one') )->first();
        $q1team1 = $scorepoint->quart1;

        if( is_null($q1team1) )
        {
            for( $i=0; $i<count($listes); $i++ )
            {
               $this->point->updatePoint( $request->post('matchref') , $listes[$i] , ['quart1' => $scores[$i] ] );
            }   
        }
        else
        {
            for( $a=0; $a<count($listes); $a++ )
            {
                $arrayStdClass = $this->point->getAllQuarts( $request->post('matchref') ,'idmatch');
                $array = json_decode(json_encode($arrayStdClass),true);
                //insertion des scores
                for($b=0; $b<count($array); $b++ )
                {
                    foreach($array[$b] as $key => $value)
                    {
                        if( is_null($array[$b][$key] ) )
                        {
                            $previous_key = array_search($key , $periodes) - 1;
                            if( $array[$b][ $periodes[$previous_key] ] <= $scores[$b] )
                            {
                                $array[$b][$key] = intval($scores[$b]);
                                break;
                            }
                            else
                                return redirect()->route('admin.show-update-match',$request->post('matchref'))->with('error','La valeur entrée n\'est pas acceptée ! ');
                        }
                    }
                }
            }
             //inserer dans Point ( 2 Teams )
            for($e=0; $e<count($listes); $e++)
                $this->point->updatePoint( $request->post('matchref') , $listes[$e] , $array[$e] );

        }

        //afficher les scores du match de chaque periode
        $resultatPoint[] = Point::where('idmatch', $request->post('matchref') )->get(['idequipe','quart1','quart2','quart3','quart4']);
   
        $resultats = $this->affichageScoreMatch(null, $request->post('matchref') , new EquipesController($request->post('one')), new EquipesController($request->post('two')), $resultatPoint);   
        
        /*$result = json_decode(json_encode($resultats), false );
        $rang = $result->rang;
        unset($result->rang);
        return view('admin.updatematchlive',compact('result','idevent','rang'));*/
        return redirect()->route('admin.show-update-match',$request->post('matchref'));
    }

    /**
    * Fonction Commencer un Match ou Match en cours
    * @param integer idmatch
    * @return array Match
    */
    public function MatchEnCours($idmatch)
    {
            $rencontre = $this->match->getmatchbyid($idmatch);
            $team1 = new EquipesController($rencontre->EQUIPE_ID1);
            $team2 = new EquipesController($rencontre->EQUIPE_ID2);

            //result 0 : initialiser Match
            //result 1 : start Match
            //result 2 : Match déjà en cours
            $main = $this->main($idmatch, $rencontre->EQUIPE_ID1, $rencontre->EQUIPE_ID2);
            $resultat[] = Point::where('idmatch', $idmatch )->get(['idequipe','quart1','quart2','quart3','quart4']);
            $arrayScore = $this->affichageScoreMatch($main, $idmatch, $team1, $team2, $resultat);   
            
            return json_decode(json_encode($arrayScore),false);
    }

    /** 
    * Fonction Affichage resultat Score Match
    * @param Array $main , integer $idmatch, Object instance Equipe $team1,  Object instance Equipe $team2, Array $result
    * @return Array scoreMatch
    */
    public function affichageScoreMatch($main=null, $idmatch, $team1, $team2, $result=null)
    {
        $equipe1 = $team1->equipe;
        $equipe2 = $team2->equipe;

            if( is_array($main) ){
                $equipe1->score = $main['scoreEquipeUn'];
                $equipe2->score = $main['scoreEquipeDeux'];
            }
            elseif( $main =='0' || $main == '1' )
            {
                $equipe1->score = $this->score;
                $equipe2->score = $this->score;
            }

            $affichage = $this->affichage;
            //get idpoule
             $getidpoule = $this->poule->getidpouleEquipeByevent($equipe1->IDEQUIPE,\Session::get('idevent'))->idpoule;
             //initialisation du Classement
            $listes = array($equipe1->IDEQUIPE, $equipe2->IDEQUIPE);
            $getquart = $this->point->getOneQuarts($idmatch,'idmatch');
            if( !is_null($getquart) )
            {
                if( is_null($getquart->quart1) )
                {
                    $boucleArray = ['periode' => $this->periode ,'start' => $this->demarrage, 'equipe1' => $team1->convertToObject() , 'equipe2' => $team2->convertToObject() ];  
                    $boucle[] = json_decode(json_encode($boucleArray));

                     $this->classement->insertionClassement($listes,$getidpoule,$idmatch,[ $equipe1->IDEQUIPE=>$equipe1->score,$equipe2->IDEQUIPE=>$equipe2->score ]);

                }
                elseif( !empty($result) )
                {   
                    $parser = json_decode(json_encode($result),false);
                    $boucle = $this->parserResultPoint($parser[0],$idmatch,$equipe1,$equipe2);
                }
                if( !is_null($getquart->quart4) )
                {
                   $affichage = false;
                   $boucle[3]->start = '<button class="btn btn-danger btn-labeled fa fa-info">Terminer</button>';
                
                   //Premiere insertion dans Classement
                    $this->classement->insertionClassement($listes,$getidpoule,$idmatch,[ $equipe1->IDEQUIPE => $equipe1->score, $equipe2->IDEQUIPE => $equipe2->score ]);
                    //Assignation fin de match
                    $fin_du_match = $this->findumatch($parser,$idmatch);
                }
            }
            else
            {
                $boucleArray = ['periode' => $this->periode ,'start' => $this->demarrage, 'equipe1' => $team1->convertToObject() , 'equipe2' => $team2->convertToObject() ];  
                $boucle[] = json_decode(json_encode($boucleArray));
            }

            //affichage du classement
            $rang = $this->classement->positionnementsClassement($getidpoule);

            return array('equipe1' => $equipe1, 'equipe2' => $equipe2, 'affichage' => $affichage ,'boucle' => $boucle ,'idmatch' => $idmatch,'rang' => $rang);
    }

    /**
    * Fonction parser resultat score Point pour afficher les quarts
    * @param Array result
    * @return Array parser
    */
    public function parserResultPoint($result,$idmatch,$equipe1=null,$equipe2=null)
    {
        //appelle fonction getlastpointMatch
        $quarts = ['quart1','quart2','quart3','quart4'];
        
        for( $i=0; $i<count($result); $i++ )
        {
            foreach ($result[$i] as $key => $value)
            {
                if( is_null($result[$i]->$key) )
                {
                    unset($result[$i]->$key);
                }
                else
                {
                    $cle = array_search($key,$quarts);
                    $tableauIndice[] = $quarts[$cle];
                }
            }
        }
        //clés des quarts non null
        $cleValue = array_values(array_unique($tableauIndice));
        //convertir en Array
        for($j=0; $j<count($cleValue); $j++ )
        {
            $resultat = json_decode(json_encode($result),true);
            //$bcl->Quarttemps1->equipe2->sigle 
                $q=$j+1;
                $periode = '<button class="btn btn-primary btn-labeled fa fa-clock-o">Quart temps '.$q.'</button>';
                $resultats = json_decode(json_encode($resultat),true);
                $tableau[] = array();
                for( $i=0; $i<count($resultat); $i++ )
                {
                    $b = $i+1;
                    $tableau[$j]['periode'] = $periode;
                    $tableau[$j]['start'] = '<button class="btn btn-success btn-labeled fa fa-spinner">En cours</button>';
                    $tableau[$j]['equipe'.$b]['sigle'] = $this->equipe->getinfoequipebyid($resultats[$i]['idequipe'])->SIGLE;
                    $tableau[$j]['equipe'.$b]['logo'] = $this->equipe->getinfoequipebyid($resultats[$i]['idequipe'])->LOGOURL;
                    $tableau[$j]['equipe'.$b]['genre'] = $this->equipe->getinfoequipebyid($resultats[$i]['idequipe'])->SEXE;
                    $tableau[$j]['equipe'.$b]['nom'] = $this->equipe->getinfoequipebyid($resultats[$i]['idequipe'])->NAME;
                    $tableau[$j]['equipe'.$b]['region'] = $this->equipe->getinfoequipebyid($resultats[$i]['idequipe'])->region;
                    $tableau[$j]['equipe'.$b]['categorie'] = $this->equipe->getinfoequipebyid($resultats[$i]['idequipe'])->categorie;
                    $tableau[$j]['equipe'.$b]['score'] = $resultats[$i][$cleValue[$j]];
                    if( $equipe1->IDEQUIPE  == $resultats[$i]['idequipe'] )
                        $equipe1->score = $resultats[$i][$cleValue[$j]];
                    if( $equipe2->IDEQUIPE  == $resultats[$i]['idequipe'] )
                        $equipe2->score = $resultats[$i][$cleValue[$j]];
                } 
        }   
         return json_decode(json_encode($tableau),false);
    }

    /**
    * Fonction fin du match : inserer le score final du match ( Total )
    * @param Object $parser, integer $idmatch
    * @return Array $boucle
    */
    public function findumatch($parser, $idmatch)
    {
        try
        {
           foreach($parser as $key => $value)
           {
                foreach($value as $cle => $valeurs )
                {
                    $update_total = $this->point->updateTotal($idmatch, $valeurs->idequipe, $valeurs->quart4);
                    $update_match = $this->match->updateMatch($idmatch, ['statut' => 'Terminer']);
                }
           }
           return true;
        }
        catch (Exception $e)
        {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
        
    }

}
