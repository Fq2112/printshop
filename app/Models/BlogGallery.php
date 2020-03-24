<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogGallery extends Model
{
    protected $table = 'blog_galleries';

    protected $guarded = ['id'];

    public function getBlog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
