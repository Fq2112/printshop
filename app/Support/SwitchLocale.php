<?php

namespace App\Support;

class SwitchLocale
{
    public function setUrl($lang)
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('/', $uri);
        unset($uri[0]);
        unset($uri[1]);

        $url = url($lang);
        foreach ($uri as $u) {
            $url .= '/' . $u;
        }

        return $url;
    }
}
