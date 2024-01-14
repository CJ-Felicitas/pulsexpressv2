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

        // assign the usertypemap
        $user_type = $userTypeMap[$user->user_type] ?? null;
        
        // Store user data in the session
        session(['user_data' => $user]);

        // redirects the user to the admin page if the user is admin, codes below are not necessary anymore for admin session
        if ($user->user_type == UserTypeEnum::ADMIN) {
            return redirect('/admin/dashboard/firstquarter');
        } else {
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
            // assign the usertypemap
            $user_type = $userTypeMap[$user->user_type] ?? null;
            $previous_quarter_result = DB::table('reports')
            ->select(DB::raw('SUM(total_physical_count) as total_physical_count'), DB::raw('SUM(total_budget_utilized) as total_budget_utilized'))
            ->where('quarter_id', 4)
            ->where('year', 2023)
            ->where('program_id', 2)
            ->first();
            $previous_program_target = DB::table('program_targets')
            ->where('quarter_id', 4)
            ->where('year', 2023)
            ->where('program_id', 2)
            ->first();
            // budget achieved
            $isBudgetAchieved = ($previous_quarter_result->total_budget_utilized >= $previous_program_target->budget_target);
            // physical target achieved
            $isPhysicalCountAchieved = ($previous_quarter_result->total_physical_count >= $previous_program_target->physical_target);
            // check if both are true
            $isAchieved = $isBudgetAchieved && $isPhysicalCountAchieved;
            if (!($isAchieved) && $user->user_type !== UserTypeEnum::ADMIN) {
                return view('client.variance');
            } else {
                return redirect('/client/dashboard');
            }
        }
    }


    // private function checkVariance(){
    //     $user = Auth::user();
    //     // User type map
    //     $userTypeMap = [
    //         5 => 1,
    //         6 => 4,
    //         7 => 2,
    //         8 => 7,
    //         9 => 6,
    //         10 => 5,
    //         11 => 3,
    //         12 => 8,
    //     ];
    //     // assign the usertypemap
    //     $user_type = $userTypeMap[$user->user_type] ?? null;
    //     $previous_quarter_result = DB::table('reports')
    //     ->select(DB::raw('SUM(total_physical_count) as total_physical_count'), DB::raw('SUM(total_budget_utilized) as total_budget_utilized'))
    //     ->where('quarter_id', 4)
    //     ->where('year', 2023)
    //     ->where('program_id', 2)
    //     ->first();
    //     $previous_program_target = DB::table('program_targets')
    //     ->where('quarter_id', 4)
    //     ->where('year', 2023)
    //     ->where('program_id', 2)
    //     ->first();
    //     // budget achieved
    //     $isBudgetAchieved = ($previous_quarter_result->total_budget_utilized >= $previous_program_target->budget_target);
    //     // physical target achieved
    //     $isPhysicalCountAchieved = ($previous_quarter_result->total_physical_count >= $previous_program_target->physical_target);
    //     // check if both are true
    //     $isAchieved = $isBudgetAchieved && $isPhysicalCountAchieved;
    //     if (!($isAchieved) && $user->user_type !== UserTypeEnum::ADMIN) {
    //         return view('admin.variance');
    //     } else {
    //         return redirect('/client/dashboard');
    //     }
    // }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
