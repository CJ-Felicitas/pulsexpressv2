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

        // mapping the quarter that will get the previous active quarter
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

        \Log::info('CHECK ME OUT: ' . $previous_quarter);

        // gets the current date 
        $now = Carbon::now('Asia/Manila');

        // check and updates the quarter base on the date on which a quarter belongs
        $firstQuarterEnd = Carbon::create(null, 4, 6, 0, 0, 0, 'Asia/Manila');
        $secondQuarterEnd = Carbon::create(null, 7, 6, 0, 0, 0, 'Asia/Manila');
        $thirdQuarterEnd = Carbon::create(null, 10, 6, 0, 0, 0, 'Asia/Manila');
        $fourthQuarterEnd = Carbon::create(null, 1, 6, 0, 0, 0, 'Asia/Manila')->addYear();
        
        // First, set all quarters to inactive
        DB::table('quarters')->update(['active' => 0]);

        if ($now->month == 1 && $now->day <= 5) {
            DB::table('quarters')->where('quarter', 4)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($firstQuarterEnd)) {
            DB::table('quarters')->where('quarter', 1)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($secondQuarterEnd)) {
            DB::table('quarters')->where('quarter', 2)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($thirdQuarterEnd)) {
            DB::table('quarters')->where('quarter', 3)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($fourthQuarterEnd) || ($now->month == 1 && $now->day <= 5)) {
            DB::table('quarters')->where('quarter', 4)->update(['active' => 1]);
        } else {
            // If the date is beyond January 5, it belongs to the first quarter of the next year
            DB::table('quarters')->where('quarter', 1)->update(['active' => 1]);
        }

        // redirects the user to the admin page if the user is admin, codes below are not necessary anymore for admin session
        if ($user->user_type == UserTypeEnum::ADMIN) {
            return redirect('/admin/dashboard/firstquarter');
        }

    // get the id of the current quarter
    $quarter_id = $current_active_quarter->id;

    // initialize the booleancheck to false as default for checking the condition of variance
    $booleancheck = false;
    $previous_quarter_result = null;

    /**
     * If the current active quarter is "quarter one"
     * then an if else condition should be done in here that it will take the previous
     * quarter result which is fourth quarter and then minus year of the current year
     * 
     * Example: 
     * January 6, 2024 then it should query the database to look up for 4th quarter 2023
     */
    if ($current_active_quarter->id === 1) {
        $previous_quarter_result = DB::table('reports')
        ->selectRaw('SUM(total_physical_count) AS physical_target, SUM(total_budget_utilized) AS budget_target')
        ->where('quarter_id', $previous_quarter)
        ->where('program_id', $user_type)
        ->where('year', Carbon::now()->subYear()->year)
        ->first();
    } else {
        /**
         * In the else condition, it will detect only the first, second, and third quarter.
         * The difference in between both of the conditions are Carbon::now()->year and Carbon::now()->subYear()->year
         * which Carbon::now()->subYear()->year means subtract one year from the current year.
         */
    $previous_quarter_result = DB::table('reports')
    ->selectRaw('SUM(total_physical_count) AS physical_target, SUM(total_budget_utilized) AS budget_target')
    ->where('quarter_id', $previous_quarter)
    ->where('program_id', $user_type)
    ->where('year', Carbon::now()->year)
    ->first();
    }

        //\Log::info('previous quarter result: ' . $previous_quarter_result);

        // performs a query to the database to fetch all the current reports
        $actual_target = DB::table('program_targets')
            ->where('quarter_id', $previous_quarter)
            ->where('program_id', $user_type)
            ->first();

        // \Log::info('actual target: ' . $actual_target);

        // check if the program target and budget target doesnt match with the actual target 
        $booleancheck = ($previous_quarter_result->physical_target < $actual_target->physical_target && $previous_quarter_result->budget_target < $actual_target->budget_target);

        // check if the previous target and budget target is zero (for fresh deployment only)
        $empty_target = ($previous_quarter_result->physical_target == 0 && $previous_quarter_result->budget_target == 0);

        // check if the user has already submitted a variance submission
        $checkvariancesubmission = DB::table('variance_submission_check')
            ->where('quarter_id', $previous_quarter)
            ->where('program_id', $user_type)
            ->where('submitted', 1)
            ->first();

        // Store user data in the session
        session(['user_data' => $user]);

        // Return redirect to the appropriate dashboard route based on user_type
        if ($user->user_type != UserTypeEnum::ADMIN && ($checkvariancesubmission || $booleancheck || $empty_target)) {
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
