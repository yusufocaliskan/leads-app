<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Users extends Controller
{
    public function login(Request $request)
    {   
        //Get the user infos..
        $data = $request->validate(
            [
                'email'=>'required|string',
                'password'=>'required|string'
            ]
        );

   
        //Check the information
        if(!Auth::attempt($data))
        {
            return response([
                'error'=>[
                    'type'=>'danger',
                    'message'=>'Something went wrong, check your informations.'
                ]
            ],422);
        }
      
        $user = Auth::user();
        
       
        //If everything is okay.
        //Create a new token
        $token = $user->createToken('main')->plainTextToken;

        //And send it back to user
        return response([
            'token'=>$token,
            'user'=>$user
        ]);
        
        
    }

    public function logout()
    {
        if(Auth::logout())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Logget out'
            ], 200);
        }

        return response()->json([
            'status' => 'danger',
            'message' => 'Something went wrong'
        ], 200);
       

        
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
