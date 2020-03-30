<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class Faq extends Model
{
    use HasTranslations;

    protected $table = 'faqs';

    protected $guarded = ['id'];

    public $translatable = ['question', 'answer'];

    public function getFaqCategory()
    {
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
