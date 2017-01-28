<?php

namespace App\Helpers;

use Auth;

class GlobalHelpers
{

    public static function getCabinetRoute($route)
    {
        if (!Auth::guest()) {
            return route($route,['user'=>Auth::user()->login]);
        }
    }
}