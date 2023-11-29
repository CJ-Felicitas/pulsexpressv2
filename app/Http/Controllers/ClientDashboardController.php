<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
            'budget_utilized' => 'required'
        ]);

        $current_active_quarter = DB::table('quarters')->where('active', 1)->first();
        $quarter_id = $current_active_quarter->id;

            if ($validate) {
            try {
                DB::beginTransaction();

                DB::table('reports')->insert([
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
                DB::commit();
                return redirect()->back()->with('report_success', 'Report Submitted');
                // return $quarter_id;
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }
}
