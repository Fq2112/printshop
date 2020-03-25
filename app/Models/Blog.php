<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class Blog extends Model
{
    use HasTranslations;

    protected $table = 'blog';

    protected $guarded = ['id'];

    protected $casts = ['files' => 'array'];

    public $translatable = ['title', 'permalink', 'content'];

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

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
