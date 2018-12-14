<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'comment',
    ];

    public function post()
    {
        /* 
        ========
        relasi one to many invers => comment to post
        ======== */
        return $this->belongsTo(Post::class);
    }
}
