<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
use App\Article;
use App\Image;
use App\Reply;
use App\ImageFond;
use App\Publicite;
use App\Comment;

use File;

use App\Http\Requests\UploadRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    private $article;
    private $comment;
    private $reply;
    private $image;

    public function __construct()
    {
        $this->article = new Article();
        $this->image = new Image();
        $this->comment = new Comment();
        $this->reply = new Reply();

        $this->image = new Image();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fond1 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut',true)->where(DB::raw('imagefonds.numfond'),'1')->first();
  
        $fond2 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut', true)->where(DB::raw('imagefonds.numfond'),'2')->first();

        /**------------------------------------------------ARTICLES---------------------------------------- */
       
        //pour les anciennent articles
        $count = DB::table('articles')->join('images','articles.images_id','=','images.id')->select('articles.*', 'images.urlimage')->where('articles.statut',true)->where('articles.archive',false)->orderBy('created_at', 'desc')->count();
      
        $article = DB::table('articles')->join('images','articles.images_id','=','images.id')->select('articles.*', 'images.urlimage')->where('articles.statut',true)->where('articles.archive',false)->orderBy('created_at', 'desc')->limit(4,$count)->offset(4)->paginate(5);
       
        foreach($article as $url)
                        {
                            $ty = explode('|',$url->urlimage);
                            $url->urlimage = $ty[0];
                        }
                        
        //fin pour les anciennent articles


        $select = DB::table('articles')->where('statut',true)->where('archive',false)->orderBy('created_at', 'desc')->get()->toArray();

/*Pour 4 nouvelles affichages------------------------------------- */

            $article4 = DB::table('articles')
                        ->join('images','articles.images_id','=','images.id')
                        ->select('articles.*', 'images.urlimage')
                        ->where('articles.statut',true)
                        ->where('articles.archive',false)
                        ->orderBy('created_at', 'desc')
                        ->limit(4)->get();


                        foreach($article4 as $url)
                        {
                            $ty = explode('|',$url->urlimage);
                            $url->urlimage = $ty[0];
                        }

/*Fin Pour 4 nouvelles affichages------------------------------------- */


/*Debut Article du mois-----------------------------------------------*/

                    $currentMonth = date('m');
                    $i=0;
                        $artMois = DB::table('articles')->join('images','articles.images_id','=','images.id')
                        ->select('articles.*', 'images.urlimage')
                        ->where('articles.statut',true)
                        ->where('articles.archive',false)
                        ->whereRaw('MONTH(articles.created_at) = ?',[$currentMonth])
                        ->orderBy('created_at', 'desc')
                        
                        ->get();

                        foreach($artMois as $url)
                        {
                            $ty = explode('|',$url->urlimage);
                            $url->urlimage = $ty[0];
                        }
  

/*Fin Article du mois-----------------------------------------------*/

            

//affichage du premier image
        $slt = DB::table('articles')->join('images','articles.images_id','=','images.id')->select('articles.*', 'images.urlimage')->where('statut',true)->where('archive',false)->orderBy('created_at', 'desc')->limit(4)->get();
        
           /* foreach($slt as $imageids)
            {
               
                $arrayid[] = $imageids->images_id;
               
            }
            $getimage = $this->image->getimagebyArrayId($arrayid);
            
    
            foreach($getimage as $get)
            {
                $prime = explode('|',$get->urlimage);
                $img1[] = $prime[0];
            }
*/
        if(count($slt) != 0)
        {
            foreach($slt as $get)
            {
                $prime = explode('|',$get->urlimage);
                $get->urlimage = $prime[0];
            }
        }
        

        //Fin Quatre premiers articles du journaux

            foreach($article as $articles)
        {

            $articles->images_id = DB::table('images')->select('images.urlimage')->where('images.id', $articles->images_id)->first();
        
        }

        /**--------------------------------------------Fin ARTICLES----------------------------------------- */




        /**----------------------------------------------PUBLICITE----------------------------------------- */

        $pub1 = Publicite::where('statut',true)->where('numpub','1')->get();
        $pub1url = DB::table('publicites')->select('publicites.url')->where('publicites.statut',true)->where(DB::raw('publicites.numpub'),'1')->get(); 


        $pub2 = Publicite::where('statut',true)->select('publicites.url')->where('numpub','2')->first();
        $pub2url = DB::table('publicites')->select('publicites.url')->where('publicites.statut',true)->where(DB::raw('publicites.numpub'),'2')->get();

        $pub3 = DB::table('publicites')->select('publicites.url')->where('statut',true)->where('publicites.numpub','3')->first();
        $pub3url = DB::table('publicites')->select('publicites.url')->where('publicites.statut',true)->where(DB::raw('publicites.numpub'),'3')->get();

        /**----------------------------------------------------------------------------------------------- */
        return view('frontjers.pages.front',compact('article','fond1','fond2','pub1','pub1url','pub2','pub2url','pub3url','pub3','select'
        ,'img1','img','slt','article4','artMois'
    ))->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showarticles($id)
    {
        
        $article = Article::find($id);
        $images = Image::where('id',$article->images_id)->get();
        $images2 = Image::where('id',$article->images_id)->first();
        $coms = Comment::where('article_id',$article->id)->paginate(5);
        foreach($coms as $com)
            {
                $reponse = $this->reply->getReplies($com->id);
            }
           $artout = DB::table('articles')->join('images','articles.images_id','=','images.id')->select('articles.*', 'images.urlimage')->where('articles.statut',true)->where('articles.archive',false)->orderBy('created_at', 'asc')->get();

           $commentaire[] = DB::table('articles')->join('comments','articles.id','=','comments.article_id')->select('comments.*')->where('comments.article_id','$article->id')->orderBy('created_at', 'desc')->get();
           //dd($article->id);
          /*  foreach($images2 as $img)
            {
                $affimage =  explode('|',$img->urlimage);    
            }*/
            
            foreach($coms as $comment)
            {
                $affimage = DB::table('comments')->join('replies','comments.id','=','replies.reply')->select('replies.*')->where('replies.reply','$comment->id')->orderBy('created_at', 'desc')->get();
            }

            //ici pour recuperer le 1er image de l'article
            foreach($images as $url)
            {
                
                $ty = explode('|',$url->urlimage);
                
                $url->urlimage = $ty[0];
                $trop = $url->urlimage;
            }
            
            //Fin ici pour recuperer le 1er image de l'article

        return view('frontjers.pages.articleshow',compact('coms', 'commentaire','reponse','fond2','fond1','article','images','images2','id','artout','conter','trop','affimage'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
