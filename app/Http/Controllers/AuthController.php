<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserTypeEnum;

class AuthController extends Controller
{
    public function login(Request $request)
    {
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

        // Store user data in the session
        session(['user_data' => $user]);

        // Return redirect to the appropriate dashboard route based on user_type
        if ($user->user_type == UserTypeEnum::ADMIN) {
            return redirect('/admin/dashboard/firstquarter');
        }
        if ($user->user_type != UserTypeEnum::ADMIN) {
            return redirect('/client/dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
