<?php

namespace App\Http\Controllers;

use App\Enums\ProgramsEnum;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Enums\ProvinceEnum;
use App\Enums\QuartersEnum;
use App\Enums\SemestersEnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserTypeEnum;

class AdminDashboardController extends Controller
{

    private function getSemesterData($programId, $year, $semester)
    {
        $quarters = [];
        if ($semester == 1) {
            $quarters = [1, 2]; // 1st and 2nd quarter for the first semester
        } elseif ($semester == 2) {
            $quarters = [3, 4]; // 3rd and 4th quarter for the second semester
        }

        $data = DB::table('reports')
            ->select(
                'province_id',
                DB::raw('SUM(male_count) as total_male_count'),
                DB::raw('SUM(female_count) as total_female_count'),
                DB::raw('SUM(male_count + female_count) as total_physical_count'),
                DB::raw('SUM(total_budget_utilized) as total_budget_utilized')
            )
            ->whereIn('quarter_id', $quarters)
            ->where('program_id', $programId)
            ->where('year', $year)
            ->groupBy('province_id')
            ->get();

        foreach ($data as $item) {
            switch ($item->province_id) {
                case ProvinceEnum::DAVAO_CITY:
                    $item->province_id = 'Davao City';
                    break;
                case ProvinceEnum::DAVAO_DE_ORO:
                    $item->province_id = 'Davao De Oro';
                    break;
                case ProvinceEnum::DAVAO_DEL_NORTE:
                    $item->province_id = 'Davao Del Norte';
                    break;
                case ProvinceEnum::DAVAO_DEL_SUR:
                    $item->province_id = 'Davao Del Sur';
                    break;
                case ProvinceEnum::DAVAO_OCCIDENTAL:
                    $item->province_id = 'Davao Occidental';
                    break;
                case ProvinceEnum::DAVAO_ORIENTAL:
                    $item->province_id = 'Davao Oriental';
                    break;
            }
        }
        return $data;
    }
    // returns the data of a quarter
    private function getProgramData($programId, $year, $quarterId)
    {
        $data = DB::table('reports')
            ->select(
                'province_id',
                DB::raw('SUM(male_count) as total_male_count'),
                DB::raw('SUM(female_count) as total_female_count'),
                DB::raw('SUM(male_count + female_count) as total_physical_count'),
                DB::raw('SUM(total_budget_utilized) as total_budget_utilized')
            )
            ->where('quarter_id', $quarterId)
            ->where('program_id', $programId)
            ->where('year', $year)
            ->groupBy('province_id')
            ->get();

        foreach ($data as $item) {
            switch ($item->province_id) {
                case ProvinceEnum::DAVAO_CITY:
                    $item->province_id = 'Davao City';
                    break;
                case ProvinceEnum::DAVAO_DE_ORO:
                    $item->province_id = 'Davao De Oro';
                    break;
                case ProvinceEnum::DAVAO_DEL_NORTE:
                    $item->province_id = 'Davao Del Norte';
                    break;
                case ProvinceEnum::DAVAO_DEL_SUR:
                    $item->province_id = 'Davao Del Sur';
                    break;
                case ProvinceEnum::DAVAO_OCCIDENTAL:
                    $item->province_id = 'Davao Occidental';
                    break;
                case ProvinceEnum::DAVAO_ORIENTAL:
                    $item->province_id = 'Davao Oriental';
                    break;
            }
        }
        return $data;
    }
    public function firstSemester(Request $request)
    {

        try {
            $fourps = $this->getSemesterData(ProgramsEnum::FOURPS, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            $slp = $this->getSemesterData(ProgramsEnum::SLP, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            $centenarrian = $this->getSemesterData(ProgramsEnum::CENTENARRIAN, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            $kalahi = $this->getSemesterData(ProgramsEnum::KALAHI, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            $spp = $this->getSemesterData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            $sfp = $this->getSemesterData(ProgramsEnum::FEEDING_PROGRAM, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            $drrm = $this->getSemesterData(ProgramsEnum::DRRM, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            $aics = $this->getSemesterData(ProgramsEnum::AICS, Carbon::now()->year, SemestersEnum::FIRST_SEMESTER);
            session([
                'data5' => [
                    'fourps' => $fourps,
                    'slp' => $slp,
                    'kalahi' => $kalahi,
                    'spp' => $spp,
                    'sfp' => $sfp,
                    'drrm' => $drrm,
                    'centenarrian' => $centenarrian,
                    'aics' => $aics,
                ]
            ]);
            return view('admin.quarters.firstsemester', ['data5' => session('data5')]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function secondSemester(Request $request)
    {
        try {
            $fourps = $this->getSemesterData(ProgramsEnum::FOURPS, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            $slp = $this->getSemesterData(ProgramsEnum::SLP, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            $centenarrian = $this->getSemesterData(ProgramsEnum::CENTENARRIAN, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            $kalahi = $this->getSemesterData(ProgramsEnum::KALAHI, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            $spp = $this->getSemesterData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            $sfp = $this->getSemesterData(ProgramsEnum::FEEDING_PROGRAM, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            $drrm = $this->getSemesterData(ProgramsEnum::DRRM, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            $aics = $this->getSemesterData(ProgramsEnum::AICS, Carbon::now()->year, SemestersEnum::SECOND_SEMESTER);
            session([
                'data6' => [
                    'fourps' => $fourps,
                    'slp' => $slp,
                    'kalahi' => $kalahi,
                    'spp' => $spp,
                    'sfp' => $sfp,
                    'drrm' => $drrm,
                    'centenarrian' => $centenarrian,
                    'aics' => $aics,
                ]
            ]);
            return view('admin.quarters.secondsemester', ['data6' => session('data6')]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function firstQuarter(Request $request)
    {
        try {
            $fourps = $this->getProgramData(ProgramsEnum::FOURPS, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            $slp = $this->getProgramData(ProgramsEnum::SLP, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            $centenarrian = $this->getProgramData(ProgramsEnum::CENTENARRIAN, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            $kalahi = $this->getProgramData(ProgramsEnum::KALAHI, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            $spp = $this->getProgramData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            $sfp = $this->getProgramData(ProgramsEnum::FEEDING_PROGRAM, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            $drrm = $this->getProgramData(ProgramsEnum::DRRM, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            $aics = $this->getProgramData(ProgramsEnum::AICS, Carbon::now()->year, QuartersEnum::FIRST_QUARTER);
            session([
                'data1' => [
                    'fourps' => $fourps,
                    'slp' => $slp,
                    'kalahi' => $kalahi,
                    'spp' => $spp,
                    'sfp' => $sfp,
                    'drrm' => $drrm,
                    'centenarrian' => $centenarrian,
                    'aics' => $aics,
                ]
            ]);
            return view('admin.quarters.firstquarter', ['data1' => session('data1')]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function secondQuarter(Request $request)
    {
        $fourps = $this->getProgramData(ProgramsEnum::FOURPS, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        $slp = $this->getProgramData(ProgramsEnum::SLP, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        $centenarrian = $this->getProgramData(ProgramsEnum::CENTENARRIAN, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        $kalahi = $this->getProgramData(ProgramsEnum::KALAHI, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        $spp = $this->getProgramData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        $sfp = $this->getProgramData(ProgramsEnum::FEEDING_PROGRAM, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        $drrm = $this->getProgramData(ProgramsEnum::DRRM, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        $aics = $this->getProgramData(ProgramsEnum::AICS, Carbon::now()->year, QuartersEnum::SECOND_QUARTER);
        session([
            'data2' => [
                'fourps' => $fourps,
                'slp' => $slp,
                'kalahi' => $kalahi,
                'spp' => $spp,
                'sfp' => $sfp,
                'drrm' => $drrm,
                'centenarrian' => $centenarrian,
                'aics' => $aics,
            ]
        ]);
        return view('admin.quarters.secondquarter', ['data2' => session('data2')]);
    }

    public function thirdQuarter(Request $request)
    {
        $fourps = $this->getProgramData(ProgramsEnum::FOURPS, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        $slp = $this->getProgramData(ProgramsEnum::SLP, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        $centenarrian = $this->getProgramData(ProgramsEnum::CENTENARRIAN, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        $kalahi = $this->getProgramData(ProgramsEnum::KALAHI, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        $spp = $this->getProgramData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        $sfp = $this->getProgramData(ProgramsEnum::FEEDING_PROGRAM, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        $drrm = $this->getProgramData(ProgramsEnum::DRRM, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        $aics = $this->getProgramData(ProgramsEnum::AICS, Carbon::now()->year, QuartersEnum::THIRD_QUARTER);
        session([
            'data3' => [
                'fourps' => $fourps,
                'slp' => $slp,
                'kalahi' => $kalahi,
                'spp' => $spp,
                'sfp' => $sfp,
                'drrm' => $drrm,
                'centenarrian' => $centenarrian,
                'aics' => $aics,
            ]
        ]);
        return view('admin.quarters.thirdquarter', ['data3' => session('data3')]);
    }

    public function fourthQuarter(Request $request)
    {
        $fourps = $this->getProgramData(ProgramsEnum::FOURPS, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        $slp = $this->getProgramData(ProgramsEnum::SLP, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        $centenarrian = $this->getProgramData(ProgramsEnum::CENTENARRIAN, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        $kalahi = $this->getProgramData(ProgramsEnum::KALAHI, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        $spp = $this->getProgramData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        $sfp = $this->getProgramData(ProgramsEnum::FEEDING_PROGRAM, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        $drrm = $this->getProgramData(ProgramsEnum::DRRM, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        $aics = $this->getProgramData(ProgramsEnum::AICS, Carbon::now()->year, QuartersEnum::FOURTH_QUARTER);
        session([
            'data4' => [
                'fourps' => $fourps,
                'slp' => $slp,
                'kalahi' => $kalahi,
                'spp' => $spp,
                'sfp' => $sfp,
                'drrm' => $drrm,
                'centenarrian' => $centenarrian,
                'aics' => $aics,
            ]
        ]);
        return view('admin.quarters.fourthquarter', ['data4' => session('data4')]);
    }

    public function getReportHistoryPage(Request $request)
    {
        $general_history = DB::table('reports')
            ->select(
                'reports.id',
                DB::raw('DATE(reports.created_at) as report_date'),
                DB::raw('TIME_FORMAT(reports.created_at, "%h:%i %p") as report_time_12hr'),
                'programs.name'
            )
            ->join('programs', 'reports.program_id', '=', 'programs.id')

            ->get();

        session(['admin_history' => $general_history]);
        return view('admin.history');
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

    public function quicksearch(Request $request)
    {

        $validate = $request->validate([
            'program' => 'required',
            'quarter' => 'required',
            'province' => 'required',
            'year' => 'required'
        ]);

        if ($validate) {
            try {
                $data = DB::table('reports')
                    ->select(
                        'municipalities.municipality as municipality_name',
                        DB::raw('SUM(reports.male_count) as total_male_count'),
                        DB::raw('SUM(reports.female_count) as total_female_count'),
                        DB::raw('SUM(reports.total_physical_count) as total_physical_count'),
                        DB::raw('SUM(reports.total_budget_utilized) as total_budget_utilized')
                    )
                    ->join('municipalities', 'reports.municipality_id', '=', 'municipalities.id')
                    ->join('programs', 'reports.program_id', '=', 'programs.id')
                    ->join('quarters', 'reports.quarter_id', '=', 'quarters.id')
                    ->join('provinces', 'reports.province_id', '=', 'provinces.id')
                    ->where([
                        ['reports.province_id', '=', $validate['province']],
                        ['reports.program_id', '=', $validate['program']],
                        ['reports.quarter_id', '=', $validate['quarter']],
                        ['reports.year', '=', $validate['year']],
                    ])
                    ->groupBy('municipalities.municipality')
                    ->get();

                return response()->json($data);

            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage()
                ], 500);
            }
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
                    return view('/admin/accountsettings');
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage()
                ], 500);
            }
        }
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
                session()->flash('account_message', 'Account successfully updated!');
                return redirect('/admin/accountsettings');
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage()
                ], 500);
            }
        } else {
            session()->flash('password_unmatched', 'Password does not match!');
            return view('admin.accountsettings');
        }
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
            'first_name' => $user->first_name,
            'middle_name' => $user->middle_name,
            'last_name' => $user->last_name,
            'username' => $user->username,
            'email' => $user->email,
            'name' => $user->name,
            'account_type' => $account_type,
        ]);

        return view('admin.accountsettings');
    }

    public function getVariances(Request $request)
    {
        $variances = DB::table('variance')->get();

        // program map
        $programMap = [
            ProgramsEnum::FOURPS => 'Pantawid Pamilyang Pilipino Program',
            ProgramsEnum::SLP => 'Sustainable Livelihood Program',
            ProgramsEnum::CENTENARRIAN => 'Centenarrian',
            ProgramsEnum::KALAHI => 'Kapit-Bisig Laban sa Kahirapan',
            ProgramsEnum::SOCIAL_PENSION_PROGRAM => 'Social Pension Program',
            ProgramsEnum::FEEDING_PROGRAM => 'Supplementary Feeding Program',
            ProgramsEnum::DRRM => 'Disaster Risk Reduction Management',
            ProgramsEnum::AICS => 'Assistance to Individual in Crisis Situation',
        ];

        // Convert program_id to program name
        $variances = $variances->map(function ($variance) use ($programMap) {
            $variance->program_id = $programMap[$variance->program_id] ?? '';
            return $variance;
        });

        // Return the updated variance data with program names
        return response()->json($variances);
    }
}
