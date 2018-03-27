<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\Reply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $this->validate($request, array(
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'comment'=>'required|min:5|max:255',
        ));

        $article = Article::find($request->post('ref'));

        $comment = new Comment();
        
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->article()->associate($article);
        
        $comment->save();

        return redirect()->route('articles',$article->id);
    }



       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeReply(Request $request)
    {
        
        $this->validate($request, array(
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'comment'=>'required|min:5|max:255',
        ));

        $article = Article::find($request->post('ref'));

        $comment = new Reply();
        
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->article()->associate($article);
        $comment->reply = $request->post('repl');
       // $comment->reply = $id;
        $comment->save();

        return redirect()->route('articles',$article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroyCom(Comment $comment, $id)
    {
        $comment = Comment::find($id);        
        $article = Article::find($comment->article_id);
        Comment::destroy($id);
        return redirect()->route('show', $article->id);
    }
}
