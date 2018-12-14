<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
