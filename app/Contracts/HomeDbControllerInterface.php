<?php


namespace App\Contracts;


use http\Env\Request;

interface HomeDbControllerInterface
{
    public function index();
    public function show($id,$request);
    public function changeLocale($locale);
    public function search($request);

}
