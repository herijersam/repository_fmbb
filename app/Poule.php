<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Poule extends Model
{
    protected $fillable = ['idpoule','idevent','libellepoule'];

    /**
    * Fonction insertion des equipes dans leur poule correspondante
    * @param string caracteres, integer idpoule
    * @return Collection Object poule
    */
    public function insertpoulevent($idpoule, $caracteres)
    {
    	return DB::table('equipe_poules')->insert([
		    		'idpoule' => $idpoule,
		    		'idequipes' => $caracteres
    			]);
    }

    /**
    * fonction listes des poules avec leus equipes pour un évenement
    * @param integer idevent
    * @return Collection Object Poule
    */
    public function listesequipesbypouleEvent($idevent)
    {
        return DB::table('poules')
                ->select('poules.idpoule', 'poules.libellepoule', 'equipe_poules.idequipes')
                ->join('equipe_poules','poules.idpoule','=','equipe_poules.idpoule')
                ->where('poules.idevent',$idevent)->get();
    }

    /**
    * fonction qui verifient si 2 equipes meme poule
    * @param integer equipe1, integer equipe2
    * @return boolean 
    */
    public function verifyequipepoule($equipe1,$equipe2)
    {
        return DB::table('equipe_poules')
                ->Where('idequipes','like', '%' . $equipe1 . '%')
                ->where('idequipes','like', '%' . $equipe2 . '%' )->first();
    }

    /** 
    * fonction getter l'id d'une poule d'un évenemnt par rapport idequipe
    * @param integer idequipe, integer idevent 
    * @return Collection Object Poule
    */
    public function getidpouleEquipeByevent($idequipe, $idevent)
    {
        return DB::table('poules')
            ->select('poules.idpoule')->join('equipe_poules','poules.idpoule','=','equipe_poules.idpoule')
            ->where('poules.idevent',$idevent)->where('equipe_poules.idequipes','like','%' . $idequipe . '%')->first();
    }


}
