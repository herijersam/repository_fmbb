<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reply extends Model
{
    protected $table = 'replies';
    
    protected $fillable = [
        'name','email','comment','approved','article_id','reply'
    ];

    public function getReplies($idcoms)
    {
        return DB::table('replies')->select('*')->where('reply',$idcoms)->get();
        
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
