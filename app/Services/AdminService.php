<?php


namespace App\Services;


use App\Contracts\AdminControllerInterface;

use App\Mail\VerifyMail;
use App\Room;
use App\Room_user;
use App\Status;
use App\User;
use Illuminate\Support\Facades\Mail;


class AdminService  implements AdminControllerInterface
{
    private $user;
    private $status ;
    /**
     * @var Room
     */
    private $room;

    public function __construct()
    {
        $this->user = new User();
        $this->status = new Status();
        $this->room = new Room_user();
    }
    public function index()
    {

        $users = $this->user->with('status')->paginate(20);
        return $users;
    }

    public function show($user_id)
    {


        $user = $this->user->with('status')->where('id',$user_id)->first();
        if ($user !==Null){
            return $user;
        }
        else{
            return  abort(404);
        }

    }

    public  function update($user_id,$request){
        $user = $this->user->with('status')->where('id',$user_id)->first();
        if ($user !==Null){
            $user->update($request->all());
            Mail::to($user->email)->send(new VerifyMail($user, $pass = Null));
        }
        else{
            return  abort(404);
        }
        return $user;
    }
    public  function destroy($user_id){
        $user = $this->user->with('status')->where('id',$user_id)->first();
        if ($user !==Null){
            $user->delete();
        }
        else{
            return  abort(404);
        }
        return true;
    }

    public  function online(){

        $room = $this->room->with('user')->orderBy('user_id','desc')->get();

        return $room;
    }


}
