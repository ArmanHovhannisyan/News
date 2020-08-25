<?php


namespace App\Contracts;



use http\Env\Request;

interface AdminControllerInterface
{
    public function index();
    public function show($user_id);
    public function update($user_id,$request);
    public  function destroy($user_id);
    public  function online();
}
