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
        // id mapping
        $fourps_id = [1, 2, 3, 4];
        $slp_id = [5, 6, 7, 8];
        $kalahi_id = [9, 10, 11, 12];
        $spp_id = [13, 14, 15, 16];
        $sfp_id = [17, 18, 19, 20];
        $drrm_id = [21, 22, 23, 24];
        $centenarrian_id = [25, 26, 27, 28];
        $aics_id = [29, 30, 31, 32];

        $fourps = DB::table('program_targets')->whereIn('id', $fourps_id)->get();
        $slp = DB::table('program_targets')->whereIn('id', $slp_id)->get();
        $kalahi = DB::table('program_targets')->whereIn('id', $kalahi_id)->get();
        $spp = DB::table('program_targets')->whereIn('id', $spp_id)->get();
        $sfp = DB::table('program_targets')->whereIn('id', $sfp_id)->get();
        $drrm = DB::table('program_targets')->whereIn('id', $drrm_id)->get();
        $centenarrian = DB::table('program_targets')->whereIn('id', $centenarrian_id)->get();
        $aics = DB::table('program_targets')->whereIn('id', $aics_id)->get();

        // Store the data in the session directly
        session(['target_data' => [
            'fourps' => $fourps,
            'slp' => $slp,
            'kalahi' => $kalahi,
            'spp' => $spp,
            'sfp' => $sfp,
            'drrm' => $drrm,
            'centenarrian' => $centenarrian,
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
        ]);

        if ($validate) {
            try {
                DB::beginTransaction();

                DB::table('program_targets')
                    ->where('program_id', $validate['program'])
                    ->where('quarter_id', $validate['quarter'])
                    ->update([
                        'physical_target' => $validate['physical_target'],
                        'budget_target' => $validate['budget_target'],
                        'updated_at'=> Carbon::now(),
                    ]);
                DB::commit();
                        return redirect()->back()->with('success','Target Applied');
            } catch (\Exception $th) {
                DB::rollBack();
                return response()->json([
                    'message' => $th
                ]);

            }
        }
    }
}
