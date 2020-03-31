<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;

class Bio extends Model
{
    use HasTranslations;

    protected $table = 'bios';

    protected $guarded = ['id'];

    protected $translatable = ['gender'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
