<?php


namespace App\Services;


use Illuminate\Support\Facades\App;

class HomeServices
{
    public static function changeLocale($locale){
        $availableLocales = ['ru', 'en' , 'hy'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
}
