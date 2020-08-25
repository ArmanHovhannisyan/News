<?php

namespace App\Http\Controllers;

use App\Contracts\UserControllerInterface;
use App\Http\Requests\UserSettingRequest;
use App\Mail\WelcomeMail;
use App\Type_admin;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    /**
     * @var UserControllerInterface
     */
    private $UserControllerInterface;

    public function __construct(UserControllerInterface $UserControllerInterface)
    {
        $this->UserControllerInterface = $UserControllerInterface;
        // $this->middleware('super_admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user_setting');
    }


    public function verifyUser($token)
    {
        $type_admin = $this->UserControllerInterface->verifyUser($token);

        return $type_admin;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $type_admin = $this->UserControllerInterface->create();
        return view('admin.UserCreate', compact('type_admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $type_admin = $this->UserControllerInterface->story($request);
        return redirect()->back()->with('message', 'Send Email');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function show()
    {
        return Auth::user();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserSettingRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserSettingRequest $request, $id)
    {
        $user = $this->UserControllerInterface->update($request, $id);

        return back()->with('message', 'User Profile Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
