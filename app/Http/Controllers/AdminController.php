<?php

namespace App\Http\Controllers;

use App\Contracts\AdminControllerInterface;
use App\Exports\UsersExport;
use App\Http\Requests\AdminRequest;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{

    private $Auth;

    public $AdminControllerInterface;

    /**
     * NewsController constructor.
     * @param AdminControllerInterface $AdminControllerInterface
     */
    public function __construct(AdminControllerInterface $AdminControllerInterface)
    {
        $this->AdminControllerInterface = $AdminControllerInterface;
       // $this->middleware('super_admin');
    }


    public function index()
    {
        $users=$this->AdminControllerInterface->index();
        return view('admin.user',compact('users'));
    }
    public function show($user_id){
        $users=$this->AdminControllerInterface->show($user_id);
        return view('admin.show', compact('users'));
    }

    public function update($user_id,AdminRequest  $request){
        $user = $this->AdminControllerInterface->update($user_id,$request);
        return redirect()->route('news.index')->with('message', $user->status->name);
    }
    public function destroy($user_id){
        $this->AdminControllerInterface->destroy($user_id);
        return back()->with('message', 'User Deleted');
    }

    public function online()
    {
        $room = $this->AdminControllerInterface->online();
        return  view('admin.Onlineinfo',compact('room'));
    }
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }
}
