<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request, $lang)
    {
        $supported = ['en', 'ru', 'kz'];
        if (in_array($lang, $supported)) {
            Session::put('app_locale', $lang);
        }
        return redirect()->back();
    }
}
