<?php

namespace App\Http\Controllers;
use App\Event;
use App\Categorie;
use App\Poule;
use App\Equipe;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\CategoriesController;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    private $equipe;
    private $evenement;
    private $categorie;

    public function __construct()
    {
        $this->equipe = new Equipe();
        $this->evenement = new Event();
        $this->categorie = new Categorie();
    }

    /**
    * Fonction afficher tous les évenements 
    * @return Collection Object Events
    */
    public function showevents()
    {
        $tableau = [];
        $event = new Event();
        //listes de tous les equipes
        $allteams = $this->equipe->allteamsby('sexe','Homme');
        //listes des Events selon 3 OPTIONS 
        $resultdb = $event->getalleventpertype();
        foreach ($resultdb as $result)
        {
                $resultatdb = $result->get();
                for ($i=0; $i < count($resultatdb); $i++) { 
                     $type = $resultatdb[$i]['typevenement'];
                 } 
                 $tableau[] =  $event->activePublishedEvent($result,$type);
                
        }
        
        $Championnat = $tableau[0];
        $Coupe = $tableau[1];
        $Ligue = $tableau[2];
        //comparaison des dates
        for($i=0; $i<count($tableau); $i++)
        {
            for($a=0; $a<count($tableau[$i]); $a++ )
            {
                 $tableau[$i][$a]->statut = $event->scopeStatutEvent($tableau[$i][$a]->startday, $tableau[$i][$a]->endday);
                 $tableau[$i][$a]->progression = $event->scopePourcentageProgress($tableau[$i][$a]->statut, $tableau[$i][$a]->startday, $tableau[$i][$a]->endday);
             }
        }
       
        return view('admin.showpageevent',compact('Championnat','Coupe','Ligue','allteams'));
    }

    /**
    * Fonction ajout d'un nouveau événement
    * @return Collection Object Events
    */
    public function addevents()
    {
        $listescategories = Categorie::all();
    	return view('admin.addeventpage',compact('listescategories'));
    }

    /** 
    * Fonction ajout des équipes participants dans l'évenement
    * @return Collection Object 
    */
    public function addteams(Request $request)
    {
        $variable = $request->session()->get('variable');
        $nbrepoule = $variable['nbrepoule'];
        //alphabetique
        $alphabet = range('A','Z');
        //listes de tous les équipes du categorie
        $equipes = new Equipe();
        $listesequipes = $equipes->listesequipespercategorie($variable['ids']);

        return view('admin.addteampage',compact('nbrepoule','alphabet','listesequipes'));
    }

    /**
    * Fonction ajout Evenement method : POST
    * @param Request $request 
    */
    public function ajoutevenement(Request $request)
    {
        if( $request->post('titre') )
        {
            $validation = $this->validate( $request , [
                'titre' => 'required',
                'lieu' => 'required',
                'description' => 'required',
                'type' => 'required',
                'participant' => 'required',
                'poule' => 'required',
                'appelation' => 'required',
                'start' => 'required',
                'end' => 'required'
            ]);
        }
        $validation = $request->post();
        unset($validation['_token']);

        // verification poule / nbre de poules
        if($request->post('poule') == 'Poule Unique')
        {
            $groupepoule = 1;
        }
        elseif($request->post('poule') == 'Plusieurs poules')
        {
            if(!empty($request->post('nbrepoules')))
                $groupepoule = intval($request->post('nbrepoules'));
            else
                $groupepoule = 1;
        }

        // verification image 
        $infoimage = $this->uploadImageto($request);
         
        if( is_array($infoimage) )
        {
           $urlevent = $infoimage[0];
        }
        else
        {
            $urlevent = null;
            $request->session()->flash('remarque', 'Vous n\'avez pas insérer d\'image ou logo pour l\'événement !<br> Veuillez insérer ultérieurement');
        }

        $insertion = Event::create([
            'startday' => date("Y-m-d",strtotime($request->post('start'))),
            'endday' => date("Y-m-d",strtotime($request->post('end'))),
            'libellevent' => $validation['titre'],
            'description' => $validation['description'],
            'lieu' => $validation['lieu'],
            'typevenement' => $validation['type'],
            'urlogoevent' => $urlevent
        ]);
       
        //verificaton Event
        $lastidevent = $insertion->id;
        $request->session()->put('idevent',$lastidevent);
        $categorieController = new CategoriesController();
        //verification des categories 
        $idtableau = $categorieController->insertioncategorieevent($lastidevent,$request->post('participant'));

       $request->session()->flash('success','L\'évenement a été inseré avec succés');
       $request->session()->put('variable',['nbrepoule' => $groupepoule , 'appelation' => $request->post('appelation'), 'ids' => $idtableau]);
       return redirect()->route('add.team');
    }

    /** 
    * Fonction ajout des equipes javascript
    * @return var string 'ok'
    */
    public function multiples(Request $request)
    {
      echo 'ok';
    }

    /** 
    * Fonction upload image unique 
    * @param Request $request 
    * @return boolean 
    */
    public function uploadImageto(Request $request)
    {
         $this->validate($request, ['image-file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable']);

        if( !empty($request->file('image-file')) )
            $requestImage =  $request->file('image-file');
        elseif( !empty($request->post('image-url')) )
            return array($request->post('image-url'), true);

        if( !empty($requestImage) && !is_null($requestImage) )
        {
            $image = $requestImage;
            $input['imagename'] = 'event-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']); 
            return array($input['imagename'],true);
        }
        else
            return false;
    }

    /**
    * Fonction ajout des equipes dans un event selon poules
    * @param post 
    * @return insertion Collection Object 
    */
    public function ajoutequipevent(Request $request)
    {
        $poule = [];
        $chaine = '';
        //compter le nombre de poule
        $nbrepoule = count($request->all()) - 1;
        $alphabet = range('A','Z');
        if( $nbrepoule >= 1 )
        {
            for( $i=0; $i<$nbrepoule ; $i++ )
            {
                $poule[] = $request->post('poule'. $alphabet[$i] ) ;
            }
            //verification si une equipe se trouve déjà dans autre poule
            foreach ($poule as $key => $value)
            {
                foreach ($value as $p ) 
                {
                   $compare[] = $p;
                }
            }
            $doublon = array_doublon($compare);
            if( !empty($doublon) )
            {
                foreach ($doublon as $double)
                {
                    $equipe = Equipe::where('idequipe',$double)->first()->SIGLE;
                    $chaine .= ' ' . $equipe . ',';
                }
                $request->session()->flash('error',' Une équipe n\' appartient qu\' à une seule poule ! <br> le(s) nom(s) d\'équipe suivante(s) reviennent dans plusieurs poules : ' . substr($chaine, 0, -1) . ' ! <br> Veuillez le(s) rectifier ! ');
                return back();
            }
            else
            {
                $caracteres = '';
                for($a=0; $a<count($poule); $a++)
                {
                    //creation et insertion des poules par rapport à l'évenement
                    $dbpoule = new Poule();
                    $dbpoule->IDEVENT = intval($request->session()->get('idevent'));
                    $dbpoule->LIBELLEPOULE = $alphabet[$a];
                    $dbpoule->save();

                     //insertion des listes équipes par rapport aux poules
                    foreach ($poule[$a] as $value)
                    {
                        $caracteres .= $value . ',';
                    }
                    $dbpoule->insertpoulevent($dbpoule->id, substr($caracteres, 0, -1) );
                    $caracteres = '';
                }
               return redirect()->route('show.event')->with('success','L\'évenement a été créé avec succés ! <br>Les équipes ont été classées respectivement dans leur poule');
            }
        } 
    }

    /**
    * Fonction update evenement
    * @param integer id
    * @return Collection Object 
    */
    public function showupdate($id)
    {
        $listes = Event::where('id',$id)->get();
        return view('admin.updatevent',compact('listes'));
    }

    /**
    * Fonction form update event
    * @param post 
    * @return Collection Object 
    */
    public function formupdatevent(Request $request)
    {
        $validation = $this->validate($request,[
            'reference' => 'required',
            'libellevent' => 'required',
            'lieu' => 'required',
            'description' => 'required',
            'typevenement' => 'required',
            'startday' => 'required',
            'endday' => 'required'
        ]);

        $insertion = Event::findOrFail($request->post('reference'));
        $tabinsertion = $insertion->toArray();
        $update = array_diff($validation,$tabinsertion);

        if(empty($update))
        {
            return back()->with('error','Aucune modification n\'a été enregistré !');
        }

        if( $request->file('image-file') || $request->post('image-url') )
        {
            $result = $this->uploadImageto($request);
            $update['urlogoevent'] = $result[0];
        }
        
       if( $update['startday'] == date('d-m-Y',strtotime($tabinsertion['startday'])) && $update['endday'] == date('d-m-Y',strtotime($tabinsertion['endday'])))
       {
            unset($update['startday'],$update['endday']);
       }
        else
        {
            $update['startday'] = date('Y-m-d',strtotime($update['startday']));
            $update['endday'] = date('Y-m-d',strtotime($update['endday']));
        }
        
        if( $insertion->update($update) ){
            return back()->with('success','Les modifications ont été enregistré avec succés !');
        }
    }

    /**
    * Fonction calculant le nombre d'équipe participant et le nombre de poule
    * @param Array listesequipespoule, integer idevent
    * @return Array
    */
    public function getministatevent($idevent, $arraylist)
    {
        $tb = '';
        foreach($arraylist as $a)
        {
            $tb .= $a->idequipes . ',';
        }
        $nbrequipes = count(explode(',',substr($tb, 0, -1)));
        $nbrepoule = count($arraylist);
        $array =  array('poules' => $nbrepoule, 'equipes' => $nbrequipes);
        return json_decode(json_encode($array));
    }

    /**
    * Fonction listes des categories participantes
    * @param integer idevent, Array listes
    * @return string chaine
    */
    public function listescategoriesparticipantes($id,$listes)
    {
        $chaine = ''; 
        if(!empty($listes))
        {
            foreach ($listes as $list )
            {
                $chaine .= $list->libellecategorie . '-';
            }
        }
         return substr($chaine, 0, -1);
    }

    /**
    * Fonction detail un évenement 
    * @param integer idevent 
    * @return Collection Object Event
    */
    public function detailevent($id)
    {
        $allequipes = [];
        $poule = new Poule();
        $event = $this->evenement->allinformationevents($id);

        foreach($event as $ev)
        {
            $ev->urlogoevent = $this->evenement->getUrlogoeventAttribute($ev->urlogoevent);
            $tabidcategories[] = $ev->IDCATEGORIE;
        }
        $listescategories = $this->categorie->getcategoriebyIn($tabidcategories);

        $listequipespoules = $poule->listesequipesbypouleEvent($id);

        foreach ($listequipespoules as $poule)
        {
            $tbpoule[] = $poule->libellepoule; 
        }

        //fonction qui determine le nombre equipe participant et nbre de poule
        $ministat = $this->getministatevent($id, $listequipespoules);
        
        for( $i=0; $i<count($listequipespoules);$i++ )
        {
            $result[] = $this->equipe->getequipesin(explode(',',$listequipespoules[$i]->idequipes));
        }
        //fonction qui liste les categories participantes
        $categparticipant = $this->listescategoriesparticipantes($id,$listescategories);
        
        //statut de progression de l'évenement
        $statutprogression = $this->evenement->scopeStatutEvent($event[0]->startday,$event[0]->endday);
        $progress = $this->evenement->scopePourcentageProgress($statutprogression, $event[0]->startday, $event[0]->endday);
        //statut disabled or not
        if( $statutprogression == 'Terminer')
            $disabled = "disabled='disabled'";
        else
            $disabled = null;

        return view('admin.detailevent',compact('result','event','tbpoule','categparticipant','ministat','progress','statutprogression','disabled'));
    }

    /**
    * Fonction de suspension evenement 
    * @param integer idevent 
    * @return redirect
    */
    public function suspendre(Request $request, $id)
    {
        $suspend = Event::findOrFail($id);
        $suspend->endday = date('Y-m-d');
        $suspend->save();
        return redirect()->route('show.event')->with('remarque','L\'évenement <b>'.$suspend->libellevent.'</b> a été suspendu par l\'administrateur');
    }

}
