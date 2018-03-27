<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Point extends Model
{
    protected $fillable = ['id','idequipe','idmatch','quart1','quart2','quart3','quart4','total'];

    /**
    * Fonction create a new Point entity
    * @param array 
    * @return Collection Object Point
    */
    public function createPoint($array)
    {
    	if( is_array($array) )
    		return self::create($array);
    	else
    		return false;
    }

       /** 
    * Fonction get point Quart temps 1 
    * @param integer idmatch 
    * @return Collection Object Point
    */
    public function getOneQuarts($idmatch,$requete)
    {
        $query = DB::table('points')->select('quart1','quart2','quart3','quart4')->where($requete,$idmatch)->first();
        //->toArray()
        //return self::hydrate($query);
        return $query;
    }

    /** 
    * Fonction get point Quart temps 1 
    * @param integer idmatch 
    * @return Collection Object Point
    */
    public function getAllQuarts($idrequete,$requete)
    {
        $query = DB::table('points')->select('quart1','quart2','quart3','quart4')->where($requete,$idrequete)->get();
        //->toArray()
        //return self::hydrate($query);
        return $query;
    }

    /** 
    * Fonction update point by idmatch et idequipe
    * @param integer idmatch, integer idequipe
    * @return Collection Object Point
    */
    public function updatePoint($idmatch, $idequipe, $update)
    {
        return self::where('idmatch',$idmatch)->where('idequipe',$idequipe)->update($update);
    }

    /**
    * fonction update Total point pour un match
    * @param integer idmatch, integer  idequipe, integer scoreTotal
    * @return Collection Object Point
    */
    public function updateTotal($idmatch, $idequipe,$scoreTotal)
    {
        return self::where('idmatch',$idmatch)->where('idequipe',$idequipe)->update(['total' => $scoreTotal]);
    }

    /** 
    * Fonction get total point d'un match
    * @param integer idmatch
    * @return Collection Object Point
    */ 
    public function getTotalbyId($idmatch)
    {
        return self::where('total',$idmatch)->first();
    }

    /**
    * Fonction get la derniere resultat du match
    * @param integer idmatch
    * @return integer quart
    */
    public function getlastPoint($idmatch,$idequipe)
    {
        $lastpoint = 00;
        $points = DB::table('points')->select('quart1','quart2','quart3','quart4')->where('idmatch',$idmatch)->where('idequipe',$idequipe)->first();

        if( !is_null($points) )
        {
            foreach($points as $key => $value)
            {
                if( !is_null($value) )
                    $lastpoint = $value;
            }
        }
        
        return $lastpoint;
    }

}
