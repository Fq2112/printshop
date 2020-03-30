<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class FaqCategory extends Model
{
    use HasTranslations;

    protected $table = 'faq_categories';

    protected $guarded = ['id'];

    public $translatable = ['name'];

    public function getFaq()
    {
        return $this->hasMany(Faq::class, 'category_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
