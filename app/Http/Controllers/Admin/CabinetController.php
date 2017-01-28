<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class CabinetController extends Controller
{
    public function index()
    {
        $title = 'Adminka';
        return view('auth.admin.cabinet')->with([
            'title' => $title,

        ]);
    }
}