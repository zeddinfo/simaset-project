<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class GlobalApiController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');

        try{
            if(!$token = JWTAuthAuth::attempt($credentials)){
                return response()->json([
                    'status' => '400',
                    'message' => 'Username dan Password tidak ditemukan'
                ]);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Gagal membuat token'
            ]); 
        }
        return response()->json(compact('token'));
    }
}
