<?php

namespace App\Http\Controllers;

use App\Status;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()

    {
        $users = User::with('status')->paginate(20);


        return view('admin.user',compact('users'));
    }
    public function show($id){
        $users = User::findOrFail($id);;
        $statuses = Status::orderBy('id')->get();
        return view('admin.show',compact('users','statuses'));
    }
}
