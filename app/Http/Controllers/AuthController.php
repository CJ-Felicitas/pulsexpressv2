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

            // map to get previous quarter 
            $quarterMapping = [
                1 => 4,
                2 => 1,
                3 => 2,
                4 => 3,
            ];

            // get the current active quarter for the current year
            $current_active_quarter = DB::table('quarters')->where('active', 1)->first();

            // assign the map
            $previous_quarter = $quarterMapping[$current_active_quarter->quarter];

            /**
             * If the current quarter is one then it will take take current year and subtract
             * it with one year so that we can fetch the previous 4th quarter last year
             */
            $year = Carbon::now()->year;
            if ($previous_quarter == 1) {
                $year = Carbon::now()->subYear();
            }

            // get the previous quarter result
            $previous_quarter_result = DB::table('reports')
                ->select(DB::raw('SUM(total_physical_count) as total_physical_count'), DB::raw('SUM(total_budget_utilized) as total_budget_utilized'))
                ->where('quarter_id', $previous_quarter)
                ->where('year', $year)
                ->where('program_id', $user_type)
                ->first();

            // get the previous program target base on a quarter
            $previous_program_target = DB::table('program_targets')
                ->where('quarter_id', $previous_quarter)
                ->where('year', $year)
                ->where('program_id', $user_type)
                ->first();

            /**
             * check if the user has already submitted a variance if the user has a variance 
             * from the previous quarter
             */
            $variance_check = DB::table('variance_submission_check')
                ->where('quarter_id', $previous_quarter)
                ->where('program_id', $user_type)
                ->where('year', $year)
                ->where('submitted', 1)
                ->first();

            // budget achieved
            $isBudgetAchieved = ($previous_quarter_result->total_budget_utilized == $previous_program_target->budget_target);

            // physical target achieved
            $isPhysicalCountAchieved = ($previous_quarter_result->total_physical_count == $previous_program_target->physical_target);

            // check if both are true
            $isAchieved = $isBudgetAchieved && $isPhysicalCountAchieved;

            // for fresh deployment in production servers
            $count_reports = DB::table('reports')->count();

            if (!($isAchieved) && ($user->user_type !== UserTypeEnum::ADMIN) && !$variance_check && !$count_reports == 0) {
                return view('client.variance');
            } else {
                return redirect('/client/dashboard');
            }
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
