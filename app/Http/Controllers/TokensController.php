<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exception\TokenExpiredException;
use Tymon\JWTAuth\Exception\TokenBlacklistedException;
use Validator;
use App\User;

class TokensController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        $validator = Validator::make($credentials,[
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Wrong validation',
                'errors' => $validator->errors()
            ], 422);
        }

        $token = JWTAuth::attempt($credentials);

        if($token){
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => User::where('email', $credentials['email'])->get()->first()
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Wrong credentials',
                'errors' => $validator->errors()
            ], 401);
        }

    }


    public function refreshToken()
    {
        $token = JWTAuth::getToken();

        try{
            $token = JWTAuth::refresh($token);
            return response()->json([
                'success' => true,
                'token' => $token
            ], 200);
        }catch(TokenExpiredException $e){
            return response()->json([
                'success' => false,
                'message' => 'Need to login again!',
                'errors' => $validator->errors()
            ], 422);
        }catch(TokenBlacklistedException $e){
            return response()->json([
                'success' => false,
                'message' => 'Need to login again!',
                'errors' => $validator->errors()
            ], 422);
        }
    }

    public function logout()
    {
        $token = JWTAuth::getToken();

        try{
            $token = JWTAuth::invalidate($token);

            return response()->json([
                'success' => true,
                'message' => "Logout successful"
            ], 200);
        }catch(JWException $e){
            return response()->json([
                'success' => false,
                'message' => 'Failed logout, please try again!'
            ], 422);
        }
    }

   
}
