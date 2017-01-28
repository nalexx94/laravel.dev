<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CabinetController extends Controller
{
    public function index()
    {
        $submenu = 0;
        $title = 'Adminka';
        $submenu = 1;
        return view('auth.cabinet.cabinet')->with([
            'title' => $title,
            'submenu' => $submenu

        ]);

        /*if (Gate::allows('showAdmin')) {
            $title = 'Adminka';
            $submenu = 1;
            return view('auth.cabinet.cabinet')->with([
                'title' => $title,
                'submenu' => $submenu

            ]);
        }

        if (Gate::allows('showCabinet')) {
            $title = 'Cabinet';
            return view('auth.cabinet.cabinet')->with([
                'title'=>$title,
                'submenu' => $submenu
            ]);
        }*/


    }
}