<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Event;
use App\Equipe;
use App\Poule;
use App\Http\Controllers\PoulesController;
use App\Http\Controllers\MatchsController;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\ClassementsController;
use Carbon\Carbon;
use App\Point;
use App\Calendrier;
use App\Match;

class CalendriersController extends Controller
{
	private $equipe;
    private $poule;
    private $event;
    private $match;
    private $calendrier;
    private $point;
    private $classement;

    public function __construct()
    {
        $this->point = new Point();
    	$this->equipe = new Equipe();
        $this->poule = new Poule();
        $this->event = new Event();
        $this->match = new Match();
        $this->calendrier = new Calendrier();
        $this->classement = new ClassementsController();

    }

    /**
    * Fonction background color Phase
    * @param string phase
    * @return string color
    */
    public function gestionColor($phase)
    {
        switch ($phase) {
            case 'phase de groupe':
                return 'dark';
                break;
            case 'quart de final':
                return 'info';
                break;
            case 'demi final':
                return 'warning';
                break;
            case 'final':
                return 'danger';
                break;
            default:
                return 'default';
                break;
        }
    }

    /**
    * Fonction view Calendrier 
    * @return view page calendrier
    */
    public function showcalendrier(Request $request, $id)
    {
        $request->session()->put('idevent',$id);
        $instancematch = new MatchsController();
        $information = $instancematch->showallmatchsbyEvent( $request );
        // verification poule
        //$color = $this->gestionColor($information->encours);
        //gets listes des matchs sur Phase de groupe
        foreach ( $information as $info ) {
            if( !is_null($info->idpoint) )
                $info->notification = $this->notificationScoreMatch($info->idmatch);
            else
                $info->notification = "";
        }
        //gets listes des matchs sur Quart de final
        $getmatchsQuarts = $instancematch->showallmatchsbyEvent($request, 'quart de final');
        //gets listes des matchs sur Demi final
        $getmatchsDemi = $instancematch->showallmatchsbyEvent($request, 'demi final');
        //gets listes des matchs sur final
        $getmatchsfinal = $instancematch->showallmatchsbyEvent($request, 'final');
        //listes des poules dans une competition ou evenement 
        $getpoules = $this->poule->listesequipesbypouleEvent($id);
        foreach ($getpoules as $values) {
            $poules[] = $values->libellepoule;
        }
    	return view('admin.calendrier',compact('information','getmatchsQuarts','getmatchsDemi','getmatchsfinal','color','poules'));
    }

    /**
    * fonction notification sur score incomplete
    * @param integer idmatch 
    * @return string $notification
    */
    public function notificationScoreMatch($idmatch)
    {
        $getpoint = $this->point->getAllQuarts($idmatch,'idmatch');

        if( is_null($getpoint[0]->quart4) )
        {
            $notif = '<button class="btn btn-mint btn-labeled fa fa-exclamation-triangle pull-right">incomplet</button>';
        }
        else
            $notif = "";

        return $notif;
    }

    /** 
    * Function View update a match (en cours)
    * @param integer idmatch
    * @return Collection Object
    */
    public function showupdatematch(Request $request , $idmatch)
    {
        $idevent = $request->session()->get('idevent');

        $matchinstance = new MatchsController();
        if( $this->calendrier->verifictionModifiableMatch($idmatch) )
        {
           $getotal = $this->point->getTotalbyId($idmatch);
           if( is_null($getotal) )
           {
                $result = $matchinstance->MatchEnCours($idmatch);
           } 
           else 
           {
                $result = $matchinstance->getResultatMatch($idmatch);
           }   
           $rang = $result->rang;
           unset($result->rang);
           return view('admin.showmatch',compact('result','idevent','rang')); 
        }
        else
        {
            return back()->with('error','Impossible de modifier le score de ce match ! Le match n\'a pas encore commencé.');
        }
    }

    /** 
    * Function Add nouveau match 
    * @return view ajout nouveau match
    */
    public function addnewmatch(Request $request)
    {
        $hidden = false;
        if($request->get('reference'))
        {
            //match indépendant
            $hidden = true;
            $equipes = Equipe::all();
        }
        else
        {
            $ids = '';
            //listes des equipes participants à l'évenement 
            $listesequipes = $this->poule->listesequipesbypouleEvent($request->session()->get('idevent'));
            foreach ($listesequipes as $listes)
            {
                $ids .= $listes->idequipes . ',';
            }
            $arrayids = explode(',',substr($ids, 0, -1));
            $equipes = $this->equipe->getequipesin($arrayids);
        }
        
        return view('admin.newmatch',compact('hidden','equipes'));
    }
    
    /**
    * Fonction inserer un nouveau match selon évenement
    * @param POST
    * @return redirect listes matchs
    */
    public function insertnewmatch(Request $request)
    {

        $validation = $this->validate($request,[
            'equipe1' => 'required|max:255',
            'equipe2' => 'required|max:255',
            'phase' => 'required',
            'terrain' => 'required',
            'date' =>  'required',
            'heure' => 'required'
        ]);
        //verification si les 2 equipes sont identiques
        if( $request->post('equipe1') != $request->post('equipe2'))
        {
            //verification si match independant
            if( $request->session()->has('matchIndependant') )
            {
                if( $this->insertionrencontre( $request ) ){
                    $request->session()->forget('matchIndependant');
                    return redirect()->route('admin.addmatch')->with('success',$request->session()->get('message'));
                }
            }    

            //fonction verfication poule
            $poule = new PoulesController();
            $verification = $poule->verificationpouleequipe( $request );
            if( $verification || $request->post('phase') != 'phase de groupe' )
            {
                //insertion rencontre : calendrier + match 
               if( $this->insertionrencontre( $request, $verification) )
                    return redirect()->route('admin.calendrier',$request->session()->get('idevent'))->with('success',$request->session()->get('message'));
            }
            else
                return redirect()->route('admin.addmatch')->with('error','Les deux equipes <b>NE</b> sont <b>PAS</b> dans le <b>MEME POULE</b> ! <br> En phase de <code>Poule</code> les équipes qui se rencontrent, doivent être dans une même poule !');
        }
        else
        {
            return redirect()->route('admin.addmatch')->with('error','Les deux equipes sont identiques ! <br> Veuillez revérifier votre insertion !');
        }
    }

    /**
    * fonction insertionrencontre regroupant calendrier + match
    * @param Object Request $request, sinteger idpoule
    * @return null
    */
    public function insertionrencontre(Request $request, $idpoule=null)
    {
        //insertion dans calendrier 
                $calendrier = [
                    'datematch' => Carbon::instance(new \Datetime($request->post('date')))->format('Y-m-d'),
                    'heurematch' => Carbon::instance(new \Datetime($request->post('heure')))->format('H:i:s'),
                    'lieumatch' => $request->post('terrain')
                ];
               $insertionCalendrier = Calendrier::create($calendrier);

                //insertion dans match 
                $match = [
                    'idevent' => $request->session()->get('idevent',null),
                    'idcalendrier' => $insertionCalendrier->id,
                    'idpoule' => $idpoule,
                    'equipe_id1' => $request->get('equipe_id1'),
                    'equipe_id2' => $request->get('equipe_id2'),
                    'phase' => $request->post('phase')
                ];
               if( $this->match->insertionMatchwithoutPoint($match) )
               {
                    $request->session()->flash('message','Le match entre <b>'. $request->post('equipe1') .'</b> et <b>'. $request->post('equipe2') .'</b> a été bien enregistré pour le <b>'.date('d-m-Y',strtotime($calendrier['datematch'])).'</b> à <b>'. $calendrier['heurematch'].'</b> !');
                    return true;
               }
    }

    /**
    * fonction permet de reporter un match 
    * @param integer idmatch
    * @return null
    */
    public function reportingmatch(Request $request)
    {   
        $validation = $this->validate($request,[
            'numeromatch' => 'required',
            'newdate' => 'required',
            'newheure' => 'date_format:"H:i"|required'
        ]);

        $idcalendrier = Match::where('idmatch',intval($request->post('numeromatch')))->first()->IDCALENDRIER;
        $date = Carbon::instance(new \Datetime($request->post('newdate')))->format('Y-m-d');
        $hour = Carbon::instance(new \Datetime($request->post('newheure')))->format('H:i:s');

      if( $date >= Carbon::today() && Carbon::createFromFormat('H:i:s', $hour )->toDateTimeString() )
      {
            $update = $this->calendrier->reportingmatchrequest( $idcalendrier, $date , $hour );
            return back()->with('success','Le match a été reporté le '. date('d-m-Y',strtotime($date)) . ' à ' . $hour . ' !');
      }  
      else
            return back()->with('error','La date ou l\'heure n\'est pas valide. Le match n\'a pas été reporté ! ');
    }

    /**
    * fonction Ajax permet de charger les resultats d'une poule
    * @param string $poule 
    * @return Array Poule
    */
    public function chargementResultatPoule(Request $request, $poule)
    {
        $results = [];
        $instanceObj = new MatchsController();
        $getallmatchsbyEvent = $instanceObj->showallmatchsbyEvent($request, 'phase de groupe');
        for ($i=0; $i < count($getallmatchsbyEvent) ; $i++) { 
            if( $getallmatchsbyEvent[$i]->libellepoule == $poule )
                $results[] = $getallmatchsbyEvent[$i];
        }

        return view('admin.ajax-poule',compact('results'));
    }

}
