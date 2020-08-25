<?php


namespace App\Contracts;




interface UserControllerInterface
{
    public function update($request,$id);
    public function create();
    public function story($request);
    public function verifyUser($token);
}
