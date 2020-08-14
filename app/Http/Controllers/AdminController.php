<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Services\AdminServices;
use App\Services\NewsServices;
use App\Status;
use App\User;
use http\Env\Request;


class AdminController extends Controller
{

    private $Auth;

    public function __construct()
    {
        $this->middleware('super_admin');
    }

    public function index()

    {
        $users = User::with('status')->paginate(20);
        return view('admin.user',compact('users'));
    }
    public function show($id){
        $users = User::findOrFail($id);
        $statuses = Status::orderBy('id')->get();
        return view('admin.show',compact('users','statuses'));
    }

    public function update($id,AdminRequest  $request){
        AdminServices::update($id,$request);
        return redirect()->route('home')->with('message', 'User Blocked');
    }
    public function destroy($id){
        $users =  User::findOrFail($id);
        $users ->delete();
        return back()->with('message', 'User Deleted');
    }
}
