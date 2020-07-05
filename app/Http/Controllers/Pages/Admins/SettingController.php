<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show_setting()
    {
        return view('pages.main.admins.setting');
    }

    public function show_general()
    {
        return view('pages.main.admins.setting.general');
    }

    public function show_maintenance()
    {
        return view('pages.main.admins.setting.maintenance');
    }
}
