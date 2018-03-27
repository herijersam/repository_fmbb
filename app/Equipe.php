<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Region;
use App\Categorie;

class Equipe extends Model
{
    protected $fillable = ['nomequipe','urlogo','sexe','sigle'];
    
    /** 
    * Fonction listes des équipes d'une categorie ou plusieurs categories 
    * @param integer id ou IN(ids)
    * @return Collection Object equipe
    */
    public function listesequipespercategorie($listesid)
    {
    	if(is_array($listesid))
    	{
    		return self::whereIn('idcategorie', $listesid )->get();
    	}
    	else
    		return null;
    }

    /**
    * fonction listes de tous les equipes de basketball categorie Homme
    * @param string $type_categorie, string $responce_categorie
    * @return Collection Object 
    */
    public function allteamsby($type_categorie=null, $responce_categorie=null)
    {
        if( !is_null($type_categorie) || !is_null($responce_categorie) )
            return self::where($type_categorie,$responce_categorie)->get();
        else
            return self::all();
    }

    /** 
    * fonction findequipe 
    * @param integer idequipe
    * @return Collection Object
    */
    public function findequipe($id)
    {
        return self::where('idequipe',$id)->first();
    }

    /**
    * Fonction information generale un equipe
    * @param integer idequipe
    * @return Collection Object Equipe
    */
    public function getinfoequipebyid($idequipe)
    {
        $info =  self::where('idequipe',$idequipe)->first();
        $instanceRegion = new Region();
        $info->region = $instanceRegion->getregion($info->IDREGION)->LIBELLE;
        $instanceCategorie = new Categorie();
        $info->categorie = $instanceCategorie->getcategoriebyid($info->IDCATEGORIE)->libellecategorie;
        return $info;
    }

    /**
    * Fonction listes equipes by IN()
    * @param string IN()
    * @return Collection Object
    */
    public function getequipesin($in)
    {
        if( is_array($in) )
            return self::whereIn('idequipe',$in)->get();
        else
            return null;
    }

    public function getLogourlAttribute($value)
    {
        if(is_null($value))
            return 'default.png';
        else
            return $value;
    }

    public function getNameAttribute($value)
    {
        if(is_null($value))
            return '<small>Aucun nom n\'est attribué</small>';
        else
            return $value;
    }

}
