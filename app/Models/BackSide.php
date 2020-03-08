<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use League\Flysystem\Config;
use Spatie\Translatable\HasTranslations;

class BackSide extends Model
{

    use HasTranslations;

    protected $table = 'back_sides';

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
