<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = ['startday','endday','libellevent','description','lieu','typevenement','urlogoevent'];

    /**
    * Fonction Scope permettant de publier listes des évenements cette année
    * @param varchar $query
    * @return Collection Object Event
    */

    public function activePublishedEvent($query,$type)
    {
    	 $start = Carbon::now()->startOfYear();
    	 $end = Carbon::now()->endOfYear();
    	 return $query->whereBetween('startday',[$start,$end])->where('typevenement',$type)->orderBy('startday','desc')->get();
    }

    /** 
    * Fonction determination d'un évenement (Statut)
    * @param Date startday, Date endday
    * @return string encours , passé, à venir
    */
    public function scopeStatutEvent($datestart, $dateend)
    {
    	$datedebut = Carbon::instance(new \DateTime($datestart))->toDateString();
    	$datefin = Carbon::instance(new \DateTime($dateend))->toDateString();

    	if( !is_null($datestart) && !is_null($dateend) )
    	{
    		if( $datedebut > Carbon::now() ) 
    		{
    			$statut = 'A venir';
    		}
    		elseif( $datedebut < Carbon::now() )
    		{
    			if( $datefin >= Carbon::now() )
    				$statut = 'en cours';
    			else
    				$statut = 'Terminer';
    		}
    	}
    	return $statut;
    }

    /**
    * Fonction progression par rapport statut evenement
    * @param string statut event
    * @return int pourcentage
    */
    public function scopePourcentageProgress($statut,$debut,$fin)
    {
    	$pourcentage = 0;
    	switch ($statut) {
    		case 'Terminer':
    			$pourcentage = 100;
    			break;
    		case 'A venir':
    			$pourcentage;
    			break;
    		case 'en cours':
    			$datedebut = Carbon::instance(new \DateTime($debut));
    			$datefin = Carbon::instance(new \DateTime($fin));
    			$interval = $datedebut->diffInDays($datefin);
    			$avant = abs($datedebut->diffInDays(Carbon::now()));
    			$apres = abs($datefin->diffInDays(Carbon::now()));

    			//condition
    			if( $avant > $apres )
    				$pourcentage = 75;
    			elseif( $avant < $apres )
    				$pourcentage = 25;
    			break;
    		default:
    			$pourcentage = 50;
    			break;
    	}
    return $pourcentage;
    }

    /** 
    * Fonction getalleventpertype : all() for type
    * @param string Type
    * @return Collection Object Event
    */
    public function getalleventpertype()
    {
    	$element = ['Championnat','Coupe','Ligue'];
    	foreach ($element as $value)
    	{
    		$result[] = self::where('typevenement',$value);
    	}
    	return $result;
    }

    /**
    * Fonction information évenement 
    * @param integer idevent
    * @return Collection Object 
    */
    public function allinformationevents($idevent)
    {
        return DB::table('events')
                ->select('*')->join('events_categories','events_categories.idevent','=','events.id')
                ->where('events.id',$idevent)->get();
    }    

    public function getUrlogoeventAttribute($value)
    {
    	if( is_null($value) ){
    		$value = 'default.png';
    		return $value;
    	}
    	else
    		return $value;
    }
}
