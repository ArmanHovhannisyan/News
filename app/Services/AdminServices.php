<?php


namespace App\Services;


use App\User;


class AdminServices
{
    public static function update($id,$request){
        User::findOrFail($id);

        User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'status_id'=>$request->status,
        ]);
    }
    public static function destroy($id){
        $users =  User::findOrFail($id);
        $users ->delete();
    }
}
