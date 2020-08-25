<?php


namespace App\Contracts;


use http\Env\Request;

interface HomeInterface
{
    public function index();
    public function show($id,$request);
    public function changeLocale($locale);

}
