<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $guarded = ['id'];

    protected $casts = ['files' => 'array'];

    public function getAdmin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function getBlogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function getBlogGallery()
    {
        return $this->hasMany(BlogGallery::class, 'blog_id');
    }

    public function prev()
    {
        return $this->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    public function next()
    {
        return $this->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }
}
