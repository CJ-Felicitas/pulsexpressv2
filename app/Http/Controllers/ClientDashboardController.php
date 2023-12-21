<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\UserTypeEnum;
use DB;

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

        // user type map
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

        $validate = $request->validate([
            'province_id' => 'required',
            'municipality_id' => 'required',
            'female_count' => 'required',
            'male_count' => 'required',
            'total_count' => 'required',
            'budget_utilized' => 'required',
            'upload_inputfile' => 'required|array', // Validate if files are present
            'upload_inputfile.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate image files
        ]);

        // change this? para lang sa date of submission na allowed na kadtong gi ingon ni sir ted
        $current_active_quarter = DB::table('quarters')->where('active', 1)->first();
        $quarter_id = $current_active_quarter->id;
        // =================
        $currentDate = Carbon::now('Asia/Manila');
        $lastDayOfMonth = $currentDate->copy()->endOfMonth();
        $submissionWindowStart = $lastDayOfMonth->copy()->subDays(5)->startOfDay();

        if ($validate) {
            try {
                if ($currentDate->isLastOfMonth() || ($currentDate->greaterThanOrEqualTo($submissionWindowStart) && $currentDate->lessThanOrEqualTo($lastDayOfMonth))) {
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
                    // handle image upload
                    if ($request->hasFile('upload_inputfile')) {
                        $files = $request->file('upload_inputfile');

                        foreach ($files as $file) {
                            $timestamp = now()->format('Y-m-d_H-i-s'); // Get timestamp in a compatible format
                            $fileName = $timestamp . "_" . $reportId . "_" . $file->getClientOriginalName();
                            $fileName = preg_replace("/[^A-Za-z0-9_\-\.]/", '_', $fileName);
                            $file->storeAs('public/images', $fileName);
                            $file->storeAs('images', $fileName); // Store in the desired folder
                            DB::table('image_reports')->insert([
                                'report_id' => $reportId,
                                'image_path' => 'images/' . $fileName, // Save the relative path to the image
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]);
                        }
                    }
                    DB::commit();
                    return redirect()->back()->with('report_success', 'Report Submitted');
                } else {
                    return redirect()->back()->with('report_error', 'Unable to submit the report');
                }

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

        if (!$report) {
            // Handle the case where the report is not found
            return response()->json(['error' => 'Report not found'], 404);
        }

        return response()->json((array) $report);
    }


}
