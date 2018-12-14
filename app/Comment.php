<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'comment', 'user_id',
    ];

    public function post()
    {
        /* 
        ========
        relasi one to many invers => comment to post
        ======== */
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
