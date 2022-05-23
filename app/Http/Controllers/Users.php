<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Users extends Controller
{
    public function login(Request $request)
    {   
        //Get the user infos..
        $credentials = $request->only('email', 'password');
        
        if ($token = $this->guard()->attempt($credentials)) {
            $resp = response()->json([
                'status' =>  'success',
                'token'=>$token

            ], 200)->header('Authorization', $token);

            $user = $this->guard()->user();
            $token = $user->createToken('main')->plainTextToken;
            echo '<pre>';
            print_r($token);
            echo '</pre>';

            return $resp;
        }
        return response()->json([
            'error' => 'login_error'
        ], 401);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'msg' => 'Logget out'
        ], 200);
    }

    public function admin(Request $request)
    {
        $admin = Admin::find(Auth::admin()->id);

        return response()->json([
            'status' => 'success',
            'data' => $admin
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()->json([
                'status' => 'success'
            ])->header('Authorization', $token);
        }

        return response()->json([
            'error' => 'refresh_token_error'
        ], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
