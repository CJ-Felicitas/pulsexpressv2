<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    // login
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Something went wrong'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'message' => 'ok',
            'token' => $token,
        ], 200);
    }


    // public function postTest(Request $req){
    //     $str = [
    //         "the request: " => $req->input('message')
    //     ];
    //     return response()->json($str);
    // }
}
