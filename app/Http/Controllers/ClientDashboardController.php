<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\UserTypeEnum;
use DB;
use Illuminate\Support\Facades\Hash;

class ClientDashboardController extends Controller
{
    public function returnView(Request $request)
    {
        $user = Auth::user();
        $user_type = null;
        switch ($user->user_type) {
            case 5:
                $user_type = 1;
                break;
            case 6:
                $user_type = 4;
                break;
            case 7:
                $user_type = 2;
                break;
            case 8:
                $user_type = 7;
                break;
            case 9:
                $user_type = 6;
                break;
            case 10:
                $user_type = 5;
                break;
            case 11:
                $user_type = 3;
                break;
            case 12:
                $user_type = 8;
                break;
            default:
                break;
        }

        if ($user_type !== null) {
            try {
                $user_belongs_to = DB::table('program_targets')
                    ->where('program_id', $user_type)
                    ->join('quarters', 'program_targets.quarter_id', '=', 'quarters.id')
                    ->where('quarters.active', 1)
                    ->get();

                foreach ($user_belongs_to as $item) {
                    switch ($item->quarter_id) {
                        case 1:
                            $item->quarter_id = '1st Quarter';
                            break;
                        case 2:
                            $item->quarter_id = '2nd Quarter';
                            break;
                        case 3:
                            $item->quarter_id = '3rd Quarter';
                            break;
                        case 4:
                            $item->quarter_id = '4th Quarter';
                            break;
                    }
                }
                session()->put('data', $user_belongs_to);
                return view('client.dashboard');

            } catch (\Exception $th) {
                return response()->json([
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }

    public function submitReport(Request $request)
    {
        $user = Auth::user();
        $user_type = null;

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

        $user_type = $userTypeMap[$user->user_type] ?? null;

        $validate = $request->validate([
            'province_id' => 'required',
            'municipality_id' => 'required',
            'female_count' => 'required',
            'male_count' => 'required',
            'total_count' => 'required',
            'budget_utilized' => 'required',
            'upload_inputfile' => 'required|array',
            'upload_inputfile.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $current_active_quarter = DB::table('quarters')->where('active', 1)->first();
        $quarter_id = $current_active_quarter->id;

        $currentDate = Carbon::now('Asia/Manila');
        $lastDayOfMonth = $currentDate->copy()->endOfMonth();
        $submissionWindowStart = $lastDayOfMonth->copy()->subDays(5)->startOfDay();

        if ($validate) {
            try {
                // if ($currentDate->isLastOfMonth() || ($currentDate->greaterThanOrEqualTo($submissionWindowStart) && $currentDate->lessThanOrEqualTo($lastDayOfMonth))) {
                DB::beginTransaction();
                $reportId = DB::table('reports')->insertGetId([
                    'program_id' => $user_type,
                    'province_id' => $validate['province_id'],
                    'municipality_id' => $validate['municipality_id'],
                    'quarter_id' => $quarter_id,
                    'female_count' => $validate['female_count'],
                    'male_count' => $validate['male_count'],
                    'total_physical_count' => $validate['total_count'],
                    'total_budget_utilized' => $validate['budget_utilized'],
                    'year' => Carbon::now()->year,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                if ($request->hasFile('upload_inputfile')) {
                    $files = $request->file('upload_inputfile');

                    foreach ($files as $file) {
                        $timestamp = now()->format('Y-m-d_H-i-s');
                        $fileName = $timestamp . "_" . $reportId . "_" . $file->getClientOriginalName();
                        $fileName = preg_replace("/[^A-Za-z0-9_\-\.]/", '_', $fileName);
                        $file->storeAs('public/images', $fileName);
                        $file->storeAs('images', $fileName);
                        DB::table('image_reports')->insert([
                            'report_id' => $reportId,
                            'image_path' => 'images/' . $fileName,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }

                DB::commit();
                return redirect()->back()->with('report_success', 'Report Submitted');
                // }
                // else {
                // return redirect()->back()->with('report_error', 'Unable to submit the report');
                // }
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }


    public function getReportHistoryPage(Request $request)
    {

        $user = Auth::user();
        $programID = null;
        // user->user_type belongs to the usertype table
        // in here we use switch case to assign the programID base on the id of the programs table. look for App/Enums/ProgramsEnum for reference.

        switch ($user->user_type) {
            case 5:
                $programID = 1;
                break;
            case 6:
                $programID = 4;
                break;
            case 7:
                $programID = 2;
                break;
            case 8:
                $programID = 7;
                break;
            case 9:
                $programID = 6;
                break;
            case 10:
                $programID = 5;
                break;
            case 11:
                $programID = 3;
                break;
            case 12:
                $programID = 8;
                break;
        }

        $specific_history = DB::table('reports')
            ->select(
                'reports.id',
                DB::raw('DATE(reports.created_at) as report_date'),
                DB::raw('TIME_FORMAT(reports.created_at, "%h:%i %p") as report_time_12hr'),
                'programs.name'
            )
            ->join('programs', 'reports.program_id', '=', 'programs.id')
            ->where('reports.program_id', $programID)
            ->orderBy('reports.created_at', 'desc') // Optional: Add this line for ordering
            ->get();

        // Return redirect to the appropriate dashboard route based on user_type
        session(['client_history' => $specific_history]);
        return view('client.history');
    }

    public function getReportDetails($reportId)
    {
        $report = DB::table('reports')
            ->select(
                'provinces.name as province_name',
                'municipalities.municipality as municipality_name',
                'quarters.quarter',
                'reports.male_count',
                'reports.female_count',
                'reports.total_budget_utilized'
            )
            ->join('provinces', 'provinces.id', '=', 'reports.province_id')
            ->join('municipalities', 'municipalities.id', '=', 'reports.municipality_id')
            ->join('quarters', 'quarters.id', '=', 'reports.quarter_id')
            ->where('reports.id', $reportId)
            ->first();

        $images = DB::table('image_reports')
            ->where('report_id', $reportId)
            ->get(['image_path']);

        return response()->json(['report' => $report, 'images' => $images]);
    }

    public function getAccountSettingsPage()
    {
        $user = Auth::user();
        $accountTypes = [
            UserTypeEnum::ADMIN => 'Administrator',
            UserTypeEnum::FOURPS => 'Pantawid Pamilyang Pilipino Program',
            UserTypeEnum::SLP => 'Sustainable Livelihood Program',
            UserTypeEnum::KALAHI => 'Kapit-Bisig Laban sa Kahirapan',
            UserTypeEnum::SOCIAL_PENSION_PROGRAM => 'Social Pension Program',
            UserTypeEnum::FEEDING_PROGRAM => 'Supplementary Feeding Program',
            UserTypeEnum::DRRM => 'Disaster Risk Reduction Management',
            UserTypeEnum::CENTENARRIAN => 'Centenarrian',
            UserTypeEnum::AICS => 'Assistance to Individual in Crisis Situation',
        ];
        $account_type = $accountTypes[$user->user_type] ?? '';

        session([
            'client_first_name' => $user->first_name,
            'client_middle_name' => $user->middle_name,
            'client_last_name' => $user->last_name,
            'client_username' => $user->username,
            'client_email' => $user->email,
            'client_name' => $user->name,
            'client_account_type' => $account_type,
        ]);

        return view('client.accountsettings');
    }


    public function editaccount(Request $request)
    {
        $validate = $request->validate([
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $middle_name = "";

        if ($request->middle_name == null) {
            $middle_name = "";
        } else {
            $middle_name = $request->middle_name;
        }
        // get the id of the current authenticated user
        $user = Auth::user();
        $userId = $user->id;
        // get current user
        $current_user = DB::table('users')
            ->where('id', $userId)
            ->first();


        if ($validate['password'] == Hash::check($validate['password'], $current_user->password) && $validate['confirm_password'] == Hash::check($validate['confirm_password'], $current_user->password)) {
            try {
                DB::beginTransaction();
                DB::table('users')
                    ->where('id', $userId)
                    ->update([
                        'first_name' => $request->first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $request->last_name,
                        'username' => $request->username,
                        'email' => $request->email,
                    ]);
                DB::commit();
                session()->flash('client_account_message', 'Account successfully updated!');
                return redirect('/client/accountsettings');
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage()
                ], 500);
            }
        } else {
            session()->flash('client_password_unmatched', 'Password does not match!');
            return view('client.accountsettings');
        }
    }


    public function editpassword(Request $request)
    {
        $validate = $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required',
        ]);
        // get the id of the current authenticated user
        $user = Auth::user();
        $userId = $user->id;
        // get current user
        $current_user = DB::table('users')
            ->where('id', $userId)
            ->first();
        $user_pass = $current_user->password;
        if ($validate) {
            try {
                if (Hash::check($validate['currentpassword'], $user_pass)) {
                    DB::beginTransaction();
                    DB::table('users')
                        ->where('id', $userId)
                        ->update([
                            'password' => Hash::make($validate['newpassword']),
                        ]);
                    DB::commit();
                    session()->flash('message', 'Password successfully changed!');
                    return redirect('/client/accountsettings');
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage()
                ], 500);
            }
        }
    }
}
