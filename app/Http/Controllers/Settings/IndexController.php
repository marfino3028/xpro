<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('pages.settings.index');
    }
}
