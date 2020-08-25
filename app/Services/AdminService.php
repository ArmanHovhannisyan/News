<?php


namespace App\Services;


use App\Contracts\AdminControllerInterface;

use App\Status;
use App\User;


class AdminServices  implements AdminControllerInterface
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->status = new Status();

    }
    public function index()
    {

        $users = $this->user::with('status')->paginate(20);
        return $users;
    }

    public function show($id)
    {

        $users = $this->user::findOrFail($id);
        $status = $this->status::orderBy('id')->get();
        $info = [
            'users' => $users,
            'statuses' => $status,
        ];
        return $info;
    }

    public  function update($id,$request){
        $this->user::findOrFail($id);

        $this->user::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'status_id'=>$request->status,
        ]);

        $status = $this->status::findOrFail($request->status)->name;

        return $status;
    }
    public  function destroy($id){
        $users =  $this->user::findOrFail($id);
        $users ->delete();
        return response(['message'=>'ok']);
    }
}
