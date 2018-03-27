<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';
    
    protected $fillable = [
        'name','email','comment','approved','article_id','reply'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
