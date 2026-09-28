<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        return view('pages/home', ['title' => 'POS Home']);
    }

    public function about()
    {
        return view('pages/about', ['title' => 'About the POS']);
    }
}
