<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function index(Request $request )
    {
//        $category = News::with('category')->where('category_id','=' , 4)->get();
//        dd($category);

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
