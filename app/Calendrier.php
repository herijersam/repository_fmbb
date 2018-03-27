<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Match;
use Carbon\Carbon;

class Calendrier extends Model
{
    protected $fillable = ['datematch','heurematch','lieumatch'];

    /**
    * Fonction reporting Match par calendrier
    * @param integer idcalendrier , DateTime date, DateTime hour
    * @return Collective Object Calendrier
    */

    public function reportingmatchrequest($idcalendrier,$date,$hour)
    {
    	return self::where('idcalendrier',$idcalendrier)->update(['datematch' => $date, 'heurematch' => $hour]);
    }

    /**
    * Fonction verifiction si match modifiable
    * @param integer idmatch
    * @return boolean 
    */
    public function verifictionModifiableMatch($idmatch)
    {
       $getidcalendrier = DB::table('matchs')
                            ->select('matchs.idmatch','matchs.idevent','matchs.idpoint','matchs.idcalendrier','matchs.phase','calendriers.datematch','calendriers.heurematch','calendriers.lieumatch')
                            ->join('calendriers','matchs.idcalendrier','=','matchs.idcalendrier')->get();
        foreach($getidcalendrier as $calendar)
        {
            $dateDumatch = $calendar->datematch;
        }

        if( $dateDumatch <= new Carbon() )
            return true;
        else
            return false;
    }
}

