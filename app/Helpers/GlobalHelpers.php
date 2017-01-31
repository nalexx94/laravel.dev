<?php

namespace App\Helpers;

use Auth;

class GlobalHelpers
{

    public static function getCabinetRoute($route)
    {

    }

    public function statusHiddenTable($status) {


        $res = '';
        switch ($status) {
            case 0: $res = 'Да'; break;
            case 1: $res = 'Нет'; break;
        }

        return $res;
    }
}