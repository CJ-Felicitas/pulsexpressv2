<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserTypeEnum;
use Carbon\Carbon;
use DB;
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

        $now = Carbon::now('Asia/Manila');

        // Define quarter boundaries considering the additional 5 days for the next quarter
        $firstQuarterEnd = Carbon::create(null, 4, 6, 0, 0, 0, 'Asia/Manila');
        $secondQuarterEnd = Carbon::create(null, 7, 6, 0, 0, 0, 'Asia/Manila');
        $thirdQuarterEnd = Carbon::create(null, 10, 6, 0, 0, 0, 'Asia/Manila');
        $fourthQuarterEnd = Carbon::create(null, 1, 6, 0, 0, 0, 'Asia/Manila')->addYear();

        // Determine the active quarter based on the current date
        if ($now->month == 1 && $now->day <= 5) {
            // January with overlap of the previous year's fourth quarter
            DB::table('quarters')->update([
                'active' => DB::raw('IF(quarter = 4, 0, IF(quarter = 1, 1, 0))')
            ]);
        } elseif ($now->lessThanOrEqualTo($firstQuarterEnd)) {
            DB::table('quarters')->update([
                'active' => DB::raw('IF(quarter = 1, 1, 0)')
            ]);
        } elseif ($now->lessThanOrEqualTo($secondQuarterEnd)) {
            DB::table('quarters')->update([
                'active' => DB::raw('IF(quarter = 2, 1, 0)')
            ]);
        } elseif ($now->lessThanOrEqualTo($thirdQuarterEnd)) {
            DB::table('quarters')->update([
                'active' => DB::raw('IF(quarter = 3, 1, 0)')
            ]);
        } elseif ($now->lessThanOrEqualTo($fourthQuarterEnd)) {
            DB::table('quarters')->update([
                'active' => DB::raw('IF(quarter = 4, 1, 0)')
            ]);
        }

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
