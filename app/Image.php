<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = "images";
    protected $fillable = ['urlimage','urlvideo'];
    //,'updated_at','created_at'

    /**
     * fonction recuperer images articles
     * @param Array $arrayid
     * @return Collection Object Image
     */
    
    public function getimagebyArrayId($arrayids)
    {
        if(is_array($arrayids))
            return self::whereIn('id',$arrayids)->get();
    }
}
