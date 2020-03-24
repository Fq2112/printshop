<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    protected $guarded = ['id'];

    public function getBlog()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
