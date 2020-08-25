<?php


namespace App\Services;

use App\Contracts\UserControllerInterface;
use App\Mail\VerifyMail;
use App\Mail\WelcomeMail;
use App\Type_admin;
use App\User;
use App\VerifyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserService implements UserControllerInterface
{


    /**
     * @var Type_admin
     */
    private $type_admin;
    private $user;
    private $VerifyUser;

    public function __construct()
    {
        $this->type_admin = new Type_admin();
        $this->user = new User();
        $this->VerifyUser = new VerifyUser();
    }


    public function create()
    {
        $type_admin = $this->type_admin->orderBy('id')->get();
        return $type_admin;
    }

    public function story($request)
    {
        $pass = $request->input('password');
        $hashPass = Hash::make($pass);
        $userAdm = $request->all();
        $userAdm['password'] = $hashPass;
        $user = $this->user->create($userAdm);

        $verifyUser = $this->VerifyUser->create([
            'user_id' => $user->id,
            'token' => sha1($user->email)
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user, $pass));

        return true;
    }

    public function update($request, $id)
    {

         $user = Auth::user();;
        if($user->id == $id) {
            $pass = $request->password;
            if ($pass != NULL) {
                $hashPass = Hash::make($pass);
                $userAdm = $request->except(['_token','_method']);
                $userAdm['password'] = $hashPass;
                $this->user->with('status')->where('id', $id)->update($userAdm);

            }
            else{
                $userAdm = $request->except(['_token','_method']);
                $userAdm['password'] = Auth::user()->getAuthPassword();
                $this->user->with('status')->where('id', $id)->update($userAdm);
            }
        } else{
            return abort(404);
        }
        $user = $this->user->with('status','type_admin')->where('id',$id)->first();
        Mail::to($user->email)->send(new VerifyMail($user, $pass));
        return $user;

    }

    public function verifyUser($token)
    {
        $verifyUser = $this->VerifyUser->where('token', $token)->first();

        if ($verifyUser != null) {
            $user = $verifyUser->user;
            if (!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();

            } else {

                return redirect('/')->with('message', 'You are approved');
            }
        } else {
            return abort(404);
        }

        return redirect('/login')->with('message', 'You have been approved');
    }
}
