<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'user_id', 'image',  'slug', 'type', 'category', 'tags'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
