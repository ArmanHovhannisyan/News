<?php

namespace App\Http\Controllers;

use App\Message;
use App\Events\MessagePosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    public function show () {

        $messages = Message::with('user')->get();
        return $messages;
    }

    public function store (Request $request) {
        $user = Auth::user();
        $message = $user->messages()->create($request->all());

        event(new MessagePosted($message, $user));

        return response()->json(['msg'=>'success'], 200);
    }
}
