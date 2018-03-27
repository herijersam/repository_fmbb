<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    
    protected $fillable = [
        'name','email','comment','reply','approved','article_id'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function replies()
    {
        return $this->hasMany('App\Comment','reply_id');
    }
}
