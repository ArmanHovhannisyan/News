<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function index()
    {


        return view('index');
    }

    public function changeLocale($locale)
    {
        $availableLocales = ['ru', 'en' , 'hy'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');

        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

}
