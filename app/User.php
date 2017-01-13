<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $hidden = ['password'];
    public $timestamps = false;

    public function createUser(Request $request){

       $user = new User();

       $user->login = $request->login;
       $user->password = $request->password;
       $user->password = Hash::make('secret');
       $user->email = $request->email;
       $user->role = $request->role;

       $user->save();

       return json_encode($user);
    }

    public function getAllUser(){

//        $textpart = DB::table('textparts')->select('id', 'name')->get();
//        $user = DB::table('users')->select('')

        return json_encode( User::all() );

    }

    public function getUserById($id){
        $user = User::find($id);
        if (is_null($user)){
            return false;
        }
        return json_encode($user);

    }

    public function  updateUser(Request $request, $id){

        $user = User::find($id);

        if ($request->login) {$user->login = $request->login;}
        if ($request->password) {
            $user->password = $request->password;
            $user->password = Hash::make('secret');
        }
        if ($request->email) {$user->email = $request->email;}
        if ($request->role) {$user->role = $request->role;}

        $user->save();

        return json_encode($user);
    }

    public function deleteUser($id){
        $user = User::find($id);
        if (is_null($user)){
            return false;
        }
        return $user->delete();
    }

    public function getUserByRole($role){
        $user = User::where('role', $role)->get();
        if (is_null($user)){
            return false;
        }
        return json_encode($user);
    }


}
