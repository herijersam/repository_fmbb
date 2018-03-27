<?php
/**
* creer le lien css du dashboard ADMIN en ligne 
* @param $url_css string : lien du fichier en local 
* format : lib/bootstrap (bootstrap.css)
*/
const LINK  = "http://localhost:8888/fmbb-repository/fmbb/public/";
if ( ! function_exists('helper_css'))
{
    function helper_css($url_css)
{
  return '<link href="'. LINK .'assets/css/'. $url_css .'.css" rel="stylesheet">' ;
}  
}
/**
* creer le lien image vers le dashboard ADMIN en ligne  
* @param $url_img string : lien de l'image en local
*/
if( ! function_exists('link_img'))
{
function link_img($url_img)
{
	return LINK . $url_img ;
}
}
/**
* creer le lien javascript vers le dashboard ADMIN en ligne  
* @param $url_js string : lien de l'image en local
* format : assets/js/lib/jquery.js ou assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.min.js
*/

if( ! function_exists('helper_js'))
{
function helper_js($url_js)
{
return '<script src="'. LINK . $url_js.'.js"></script>';
}
}
/**
* creer le lien css plugin vers le frontEnd en ligne  
* @param $url_css string : lien du css/plugin en local
* format : plugins/slick-nav/slicknav
*/
if( ! function_exists('plugin_css'))
{
	function plugin_css($plugin_css)
	{
		return '<link href="'. LINK . $plugin_css .'.css" rel="stylesheet">';
	}
}
/** 
*chargement des fichiers xml_loader_files
* @param Route Xml 
* @return Array Xml 
*/
if( ! function_exists('xml_loader_files') )
{
	function xml_loader_files($xml_name)
	{
		$xml_routes = public_path().'/xml/'.$xml_name.'.xml';
		
		if(File::exists($xml_routes))
		{
			$xml = simplexml_load_file($xml_routes);
			return $xml;		
		}
		else
		{
			echo "Fichier xml non trouvé";
		}
	}
}

/** 
* Helpers Pagination bootstrap boo-admin 
* @param Object LengthAwarePaginator 
* @return view : pagination-admin
*/

if( ! function_exists('paginationAdmin') )
{
	function paginationAdmin($lengthAwarePaginator)
	{
		return view('admin.pagination-admin',compact('lengthAwarePaginator'));
	}
}

/**
* Fonction qui recupere les doublons
* @param array 
* @return array
*/
if( ! function_exists('array_doublon') )
{
	function array_doublon($array)
	{
	    if (!is_array($array))
	    {
	    	return false; 
	    } 
	    $r_valeur = Array();

	    $array_unique = array_unique($array); 

	    if ( count($array) - count($array_unique) )
	    { 
	        for ( $i=0; $i<count($array); $i++ ) 
	        {
	            if (!array_key_exists($i, $array_unique))
	            {
	            	 $r_valeur[] = $array[$i];
	            } 
	               
	        } 
    	} 
    	return $r_valeur;
	} 

	/**
	* fonction verifier si un Object est vide
	* @param Object 
	* @return boolean true or false
	*/
	if( ! function_exists('array_is_empty') )
	{
		function array_is_empty($object)
		{
			if( count($object) == 0 )
				return true;
			elseif( count($object) != 0 )
			{
				for ($i=0; $i < count($object) ; $i++) { 
					if( !isset($object[$i]) )
						return true;
					else{
						if( is_array($object[$i]) || is_object($object[$i]) )
							return false;
						else
							return true;
					}
				}
			}

		}
	}


}
