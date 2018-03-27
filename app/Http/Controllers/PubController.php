<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imagefond;
use App\Article;
use App\Image;
use App\Publicite;

use File;

use App\Http\Requests\UploadRequest;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class PubController extends Controller
{


    public function indexpub()
    {
        $pub = Publicite::orderBy('created_at', 'desc')->paginate(7);

        return view('articles.pages.publicite',compact('pub'))->with('i', (request()->input('page', 1) - 1) * 7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpub()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepub(Request $request)
    {
        $files=Input::file('photos');
        
        
        if(!is_null($files) && !empty($files) && !empty($request->description))
        {

            
            $files=Input::file('photos');
            
            $name=$files->getClientOriginalName(); 
            $files->move('app/photos',$name); 
            
    

              DB::table('publicites')->insert(array(
                'numpub'=>$request->numpub,
                'statut'=>false,
                'description'=>$request->description,
                'contenu'=>$request->contenu,
                'url'=> $name,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')

              ));
            return redirect()->route('publicite')->with('success','Publicité inseré!! ');              
        }
        
        
        else 
        {
            return redirect()->route('publicite')->with('warning','Il y-a de champ incomplété ou pas d\'Image selectionné!! ');
        }


        return redirect()->route('publicite')->with('success','Publicité inseré!! ');
    }

    public function publierpub(Request $request, $id)
    {
        $pub = Publicite::find($id);

        if($pub->statut == false)
        {
            $pub->statut = true;
            $pub->save();
        }
        else
        {
            $pub->statut = false;
            $pub->save();
        }
        
        
        return redirect()->route('publicite');
    }

    public function supprpub(Request $request, $id)
    {
        Publicite::destroy($id);
        return redirect()->route('publicite');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showpub($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpub($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepub(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
