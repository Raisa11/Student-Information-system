<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>  bcrypt($request->password),
        ]);
        $token = $user->createToken('online')->accessToken;
        return response()->json([
            'token'=> $token
        ],200);
    }

    public function login(Request $request){
        $userInfo = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if(auth()->attempt($userInfo)){
            $token = auth()->user()->createToken('online')->accessToken;
            return response()->json([
                'token'=> $token
            ],200);
        }
        else{
            return response()->json([
                'error'=> 'unauthorized'
            ],401);
        }
    }

    public function userDetails(){
        return response()->json([
            'user'=> auth()->user()
        ],200);
    }

    public function update(Request $request,$id){
        $user = User::find($id);

       $user->name = $request->name;
        $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->save();

        $token = $user->createToken('online')->accessToken;
        return response()->json([
            'token'=> $token
        ],200);
    }

    public function delete(Request $request,$id){
        $user = User::find($id);
        $user->delete();
        return response()->json($user);

    }
}
