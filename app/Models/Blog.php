<?php

namespace App\Models;

use App\User;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $guarded = ['id'];

    protected $casts = ['files' => 'array'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBlogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function getBlogGallery()
    {
        return $this->hasMany(BlogGallery::class, 'blog_id');
    }
}
