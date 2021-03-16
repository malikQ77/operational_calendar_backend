<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class User extends Controller
{

    public function login(Request $request)
    {

        $request->validate(
            [
                'username' => 'required|string',
                'password' => 'required|string',
            ]
        );
        $user = DB::table('users')
            ->where(['username'=> $request->username , 'password' => $request->password])
            ->first();

        if($user){

            $x = \App\Models\User::find($user->id);
            $x->device_token = $request->device_token;
            $x->save();

            return [
                'success' => true,
                'data' => $x,
            ];
        }

        else{
            return [
                'success' => false,
                'data' => [
                    'msg' => 'Wrong username or password'
                ],
            ];
        }
    }
}
