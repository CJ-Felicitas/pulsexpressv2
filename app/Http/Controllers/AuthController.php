<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserTypeEnum;
class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($credentials)) {
            return view('login', [
                'message' => 'Invalid Credentials'
            ]);
        }
        $user = Auth::user();
        // $token = $user->createToken('token')->plainTextToken;
        $user_type = null;
        switch ($user->user_type) {
            case 1:
                $user_type = "ADMIN";
                break;
            case 2:
                $user_type = "GUEST";
                break;
            case 3:
                $user_type = "TESTER";
                break;
            case 5:
                $user_type = "FOURPS";
                break;
            case 6:
                $user_type = "KALAHI";
                break;
            case 7:
                $user_type = "SLP";
                break;
            case 8:
                $user_type = "DRRM";
                break;
            case 9:
                $user_type = "FEEDING_PROGRAM";
                break;
            case 10:
                $user_type = "SOCIAL_PENSION_PROGRAM";
                break;
            case 11:
                $user_type = "CENTENARRIAN";
                break;
            case 12:
                $user_type = "AICS";
            default:
                break;
        }
        if ($user->user_type == UserTypeEnum::ADMIN) {
            return redirect('/dashboard')->with('user', $user);
        } else {
            return redirect('/client')->with('user', $user);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
