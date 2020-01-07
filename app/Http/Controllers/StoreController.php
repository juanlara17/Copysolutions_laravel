<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function catalog()
    {
        return view('/pages.portfolio.portfolio');
    }

    public function show()
    {

    }
}
