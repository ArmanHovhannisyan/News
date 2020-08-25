<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Room;
use App\Room_user;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;
use App\Events\SendMsgEvent;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getChatView(Request $request)
    {
        $user = Auth::user();
        if($user->type_admin_id !== 3){
            $room = $request->user_id;
        }
        else {
            $room = $user->id;
        }

        event(new SendMsgEvent($room, $message = ''));
        $room_user = Room_user::where('user_id', $room)->get();
        return view('admin.inbox',compact('room_user','room'));
    }

    public function chat(Request $request)
    {


        $user = Auth::user();
        if($user->type_admin_id == 2){
            $room = $request->user_id;
        }
        else {
            $room = $user->id;
        }


        $message = $request->message;
        Room_user::create([
            'user_id'=> $room,
            'message'=> $message,
        ]);
        if ($message) {
            event(new SendMsgEvent($room, $message));
            return response()->json(['result' => 'ok'], 200);
        }
    }
}
