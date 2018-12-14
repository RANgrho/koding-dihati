<?php

namespace App;

use App\Comment;
use App\User;
use App\Tag;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /* protected $table = 'posts'; */

    protected $fillable = [
        'title', 'context', 'tag',
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
