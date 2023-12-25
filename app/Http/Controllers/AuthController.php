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
        // User type map
        $userTypeMap = [
            5 => 1,
            6 => 4,
            7 => 2,
            8 => 7,
            9 => 6,
            10 => 5,
            11 => 3,
            12 => 8,
        ];

        $current_active_quarter = DB::table('quarters')->where('active', 1)->first();

        $user_type = $userTypeMap[$user->user_type] ?? null;


        $previous_quarter = DB::table('quarters')
            ->where('id', ($current_active_quarter->id - 1 + 4) % 4 + 1)
            ->first();



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
        if ($user->user_type == UserTypeEnum::ADMIN) {
            return redirect('/admin/dashboard/firstquarter');
        }
        $current_active_quarter = DB::table('quarters')->where('active', 1)->first();
        $quarter_id = $current_active_quarter->id;

        $booleancheck = false;

        $previous_quarter_result = DB::table('reports')
            ->selectRaw('SUM(total_physical_count) AS physical_target, SUM(total_budget_utilized) AS budget_target')
            ->where('quarter_id', $previous_quarter->id)
            ->where('program_id', $user_type)
            ->first();

        $actual_target = DB::table('program_targets')
            ->where('quarter_id', $previous_quarter->id)
            ->where('program_id', $user_type)
            ->first();

        $booleancheck = ($previous_quarter_result->physical_target < $actual_target->physical_target && $previous_quarter_result->budget_target < $actual_target->budget_target);

        $checkvariancesubmission = DB::table('variance_submission_check')
            ->where('quarter_id', $previous_quarter->id)
            ->where('program_id', $user_type)
            ->where('submitted', 1)
            ->first();

        // Store user data in the session
        session(['user_data' => $user]);

        // Return redirect to the appropriate dashboard route based on user_type

        if ($user->user_type != UserTypeEnum::ADMIN && ($checkvariancesubmission || $booleancheck)) {
            return redirect('/client/dashboard');
        } else {
            return redirect('/client/variance');
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
