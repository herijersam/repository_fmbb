<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Match extends Model
{
	protected $table = 'matchs';
    protected $fillable = ['idevent','idpoint','idcalendrier','idpoule','equipe_id1','equipe_id2','statut','phase'];

    /** 
    * fonction Ajouter un match sans resultat 
    * @param Array $match
    * @return null
    */
    public function insertionMatchwithoutPoint($array)
    {
    	if(is_array($array))
    	{
    		self::create($array);
    		return true;
    	}
    }

    /**
    * fonction listes rencontres par evenements et phase
    * @param integer idevent, string phase
    * @return Collection Object Match 
    */
    public function getMatchsbyEvents($idevent, $phase)
    {
        return DB::table('matchs')
                -> select('matchs.idmatch','matchs.idevent','matchs.idpoint','calendriers.datematch','calendriers.heurematch','calendriers.lieumatch','poules.libellepoule','matchs.statut','matchs.phase','matchs.equipe_id1 as equipeA','matchs.equipe_id2 as equipeB')
                ->join('calendriers','calendriers.idcalendrier','=','matchs.idcalendrier')
                ->join('poules','poules.idpoule','=','matchs.idpoule')
                ->where('matchs.idevent',$idevent )->where('matchs.phase' , $phase )->get();
    }  

    /**
    * Fonction get information d'un match par idmatch
    * @param integer idmatch
    * @return Collection Object Match
    */
    public function getmatchbyid($idmatch)
    {
        if( !is_null($idmatch) )
            return self::where('idmatch',$idmatch)->first();
    }

    /**
    * Fonction mettre à jour le Point dans Match
    * @param integer idpoint
    * @return Collection Object Match
    */
    public function updateMatch($idmatch,$update)
    {
        if( !empty($idmatch) && is_array($update) )
            return self::where('idmatch',$idmatch)->update($update);

    }

}
