<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imagefond;
use App\Article;
use App\Image;

use File;

use App\Http\Requests\UploadRequest;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ImagePubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

/**------------------------------------------------------FOND DU SITE--------------------------------------------------- */
    public function fond()
    {
        
        $image =Imagefond::orderBy('created_at', 'desc')->paginate(4);

        return view('articles.pages.imagefond',compact('image'))->with('i', (request()->input('page', 1) - 1) * 4);

    }

    public function insertimages(Request $request)
    {
        
        
        
        $files1=Input::file('photos1');
        
        if(!is_null($files1))
        {

              $name1=$files1->getClientOriginalName(); 
              $files1->move('app/photos',$name1); 
              //$desc = $request->description1;

              if($request->fond == 'avant')

                {              
                        DB::table('imagefonds')->insert(array(
                        'description'=>$request->description1,
                        'numfond'=>'1',
                        'statut'=>false,
                        'url'=> $name1,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s')
                    ));
                    return redirect()->route('fond')->with('success','Image du devant inseré!! ');              
                }
              else
                {              
                    DB::table('imagefonds')->insert(array(
                    'description'=>$request->description1,
                    'numfond'=>'2',
                    'statut'=>false,
                    'url'=> $name1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ));
                return redirect()->route('fond')->with('success','Image Fond inseré!! ');              
                }
        }
        else 
        {
            return redirect()->route('fond')->with('warning','pas d\'Image selectionné!! ');
        }


        return redirect()->route('fond')->with('success','Image inseré!! ');
    }


    public function publication(Request $request, $id)
    {
        
        $img = Imagefond::find($id);

        $fn2 = DB::table('imagefonds')->where('numfond','2')->where('statut',true)->get()->count();
        $fn1 = DB::table('imagefonds')->where('numfond','1')->where('statut',true)->get()->count();


        $st2 = DB::table('imagefonds')->where('numfond','2')->where('statut',false)->get()->count();
        $st1 = DB::table('imagefonds')->where('numfond','1')->where('statut',false)->get()->count();
        
    if($img->statut == true)
    {
        
            $img->statut = false;
            $img->save();
        
    }
    else
    {

            $img->statut = true;
            $img->save();
            return redirect()->route('fond')->with('success','L\'image est publié');
    }

    return redirect()->route('fond');
    
}



    public function destroy($id)
    {
        $imdel = Imagefond::find($id);
        $image = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.id',$id)->first()->url;
        
        File::delete('app/photos/'.$image);
        
        Imagefond::destroy($id);
                
        return redirect()->route('fond')->with('warning','Image supprimée!');

    }


/**------------------------------------------------------FIN FOND DU SITE--------------------------------------------------- */


}
