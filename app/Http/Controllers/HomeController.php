<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\Services\HomeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function index(Request $request )
    {
        $news = News::with('category')->orderBy('id','desc')->get();
        $categories = Category::with('news')->paginate(20);



        return view('index',compact('news','categories'));
    }

    public function changeLocale($locale)
    {
        HomeServices::changeLocale($locale);
        return redirect()->back();
    }

    public function carousel(){

    }

}
