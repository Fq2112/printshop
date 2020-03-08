<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use League\Flysystem\Config;
use Spatie\Translatable\HasTranslations;

class Lamination extends Model
{

    protected $table = 'laminations';

    protected $guarded = ['id'];

}
