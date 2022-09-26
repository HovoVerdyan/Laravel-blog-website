<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ADDED THIS LINE

class Comment extends Model
{
    use HasFactory; // ADDED THIS LINE

    public function blogPost()
    {
        // return $this->belongsTo(BlogPost::class, 'post_id', 'blog_post_id')

        return $this->belongsTo(BlogPost::class);
    }
}
