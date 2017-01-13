<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    protected $user = null;

    public function __construct(User $user)
    {
        $this->user= $user;
    }


    public function createUser(Request $request){
        $validator = Validator::make($request->all(),[
            'login' => 'required|unique:users,login',
            'password' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->first());
        }

        return $this->user->createUser($request);

    }

    public function getAllUser(){
        return $this->user->getAllUser();

    }

    public function getUserById($id){
        $user =  $this->user->getUserById($id);
        if (!$user){
            return response()->json(['response' => 'Fail'], 400);
        }else return $user;
    }

    public function  updateUser(Request $request, $id){

        /*$validator = Validator::make($request->all(),[
            'login' => 'required|unique:users,login',
            'password' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->first());
        }*/
        return $this->user->updateUser($request, $id);
    }

    public function deleteUser($id){
        $user =  $this->user->deleteUser($id);

        if (!$user){
            return response()->json(['response' => 'Fail'], 400);
        }
        return response()->json(['response' => 'Successful'], 200);
    }

    public function getUserByRole($role){
        $user =  $this->user->getUserByRole($role);

        if (!$user){
            return response()->json(['response' => 'Fail'], 400);
        }else return $user;
    }



}
