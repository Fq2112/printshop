<?php
/**
 * Created by PhpStorm.
 * User: fiqy_
 * Date: 10/1/2018
 * Time: 8:37 PM
 */

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

class SwitchLocale extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SwitchLocale';
    }
}
