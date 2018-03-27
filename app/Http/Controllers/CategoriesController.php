<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Categorie;

class CategoriesController extends Controller
{
	private $categorie;

	public function __construct()
	{
		$this->categorie = new Categorie();
	}
    /**
    * fonction insertion relation Events_categories
    * @param array 
    * @return Collection Object 
    */
    public function insertioncategorieevent($id, array $categorie)
    {
    	$tableauid = [];
    	//verification de la categorie
    	for($i=0;$i<count($categorie);$i++)
    	{
    		$idcategorie = Categorie::where('libellecategorie',$categorie[$i])->first()->id;
    		$tableauid[] = $idcategorie;
    		if(!empty($idcategorie))
    		{
    			$relation = ['event' => intval($id), 'categorie' => intval($idcategorie) ];
    			$this->categorie->insertionRelationshipEventsCategories($relation);
    		}
    		else
    		{
    			Session::flash('error','La catégorie correspondante n\'a été trouvé');
    			return null;
    		}
    	} 
    	return $tableauid;
    }

}
