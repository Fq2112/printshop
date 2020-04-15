<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\App;

class Edge extends Model
{
    use HasTranslations;

    protected $table = 'edges';

    protected $guarded = ['id'];

    public $translatable = ['name','description'];

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
