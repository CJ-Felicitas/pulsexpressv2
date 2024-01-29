<?php

namespace App\Http\Controllers;

use App\Enums\QuartersEnum;
use App\Enums\ProgramsEnum;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class TargetController extends Controller
{
    public function returnView(Request $request)
    {
        
        // // id mapping of the programs
        // $fourps_id = [1, 2, 3, 4];
        // $slp_id = [5, 6, 7, 8];
        // $kalahi_id = [9, 10, 11, 12];
        // $spp_id = [13, 14, 15, 16];
        // $sfp_id = [17, 18, 19, 20];
        // $drrm_id = [21, 22, 23, 24];
        // $centenarrian_id = [25, 26, 27, 28];
        // $aics_id = [29, 30, 31, 32];


        $fourps = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::FOURPS)
        ->get();

        $slp = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::SLP)
        ->get();
    
        $kalahi = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::KALAHI)
        ->get();
        
        $spp = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::SOCIAL_PENSION_PROGRAM)
        ->get();
        
        $sfp = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::FEEDING_PROGRAM)
        ->get();

        $drrm = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::DRRM)
        ->get();
      
        $centenarrian = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::CENTENARRIAN)
        ->get();
      
        $aics = DB::table('program_targets')
        ->where('program_id', ProgramsEnum::AICS)
        ->get();

        // Store the data in the session directly
        session(['target_data' => [
            'fourps' => $fourps,
            'slp' => $slp,
            'kalahi' => $kalahi,
            'spp' => $spp,
            'sfp' => $sfp,
            'drrm' => $drrm,
            'cent' => $centenarrian,
            'aics' => $aics,
        ]]);

        return view('admin.target', ['target_data' => session('target_data')]);
    }

    public function updateTarget(Request $request)
    {
        $validate = $request->validate([
            'physical_target' => 'required',
            'budget_target' => 'required',
            'quarter' => 'required',
            'program' => 'required',
            'year' => 'required'
        ]);

        if ($validate) {
            try {
                DB::beginTransaction();

                DB::table('program_targets')
                    ->where('program_id', $validate['program'])
                    ->where('quarter_id', $validate['quarter'])
                    ->where('year', $validate['year'])
                    ->update([
                        'physical_target' => $validate['physical_target'],
                        'budget_target' => $validate['budget_target'],
                        'updated_at' => Carbon::now(),
                    ]);
                DB::commit();
                return redirect()->back()->with('success', 'Target Applied');
            } catch (\Exception $th) {
                DB::rollBack();
                return response()->json([
                    'message' => $th
                ]);

            }
        }
    }

    public function addTarget(Request $request){

        $validate = $request->validate([
            'physical_target' => 'required',
            'budget_target' => 'required',
            'quarter' => 'required',
            'program' => 'required',
            'year' => 'required'
        ]);
   
        if ($validate) {
            try {
                // data to be inserted in the program_targets table
                $data = [
                    'program_id' => $validate['program'],
                    'quarter_id' => $validate['quarter'],
                    'physical_target' => $validate['physical_target'],
                    'budget_target' => $validate['budget_target'],
                    'year' => $validate['year'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];

                DB::beginTransaction();
                DB::table('program_targets')->insert($data);
                DB::commit();
                return redirect('/admin/target');

            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json([
                    'message'=> $th->getMessage()
                ]) ;
            }
        } else{
            return redirect('/admin/target');
        }
    
    }


    
}
