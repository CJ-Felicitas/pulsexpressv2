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


        // $fourps_summary_one = $this->sumbyquarter(ProgramsEnum::FOURPS, 1);
        // $slp_summary_one = $this->sumbyquarter(ProgramsEnum::SLP, 1);
        // $centenarrian_summary_one = $this->sumbyquarter(ProgramsEnum::CENTENARRIAN, 1);
        // $kalahi_summary_one = $this->sumbyquarter(ProgramsEnum::KALAHI, 1);
        // $spp_summary_one = $this->sumbyquarter(ProgramsEnum::SOCIAL_PENSION_PROGRAM, 1);
        // $sfp_summary_one = $this->sumbyquarter(ProgramsEnum::FEEDING_PROGRAM, 1);
        // $drrm_summary_one = $this->sumbyquarter(ProgramsEnum::DRRM, 1);
        // $aics_summary_one = $this->sumbyquarter(ProgramsEnum::AICS, 1);

        // $fourps_summary_two = $this->sumbyquarter(ProgramsEnum::FOURPS, 2);
        // $slp_summary_two = $this->sumbyquarter(ProgramsEnum::SLP, 2);
        // $centenarrian_summary_two = $this->sumbyquarter(ProgramsEnum::CENTENARRIAN, 2);
        // $kalahi_summary_two = $this->sumbyquarter(ProgramsEnum::KALAHI, 2);
        // $spp_summary_two = $this->sumbyquarter(ProgramsEnum::SOCIAL_PENSION_PROGRAM, 2);
        // $sfp_summary_two = $this->sumbyquarter(ProgramsEnum::FEEDING_PROGRAM, 2);
        // $drrm_summary_two = $this->sumbyquarter(ProgramsEnum::DRRM, 2);
        // $aics_summary_two = $this->sumbyquarter(ProgramsEnum::AICS, 2);

        // $fourps_summary_three = $this->sumbyquarter(ProgramsEnum::FOURPS, 3);
        // $slp_summary_three = $this->sumbyquarter(ProgramsEnum::SLP, 3);
        // $centenarrian_summary_three = $this->sumbyquarter(ProgramsEnum::CENTENARRIAN, 3);
        // $kalahi_summary_three = $this->sumbyquarter(ProgramsEnum::KALAHI, 3);
        // $spp_summary_three = $this->sumbyquarter(ProgramsEnum::SOCIAL_PENSION_PROGRAM, 3);
        // $sfp_summary_three = $this->sumbyquarter(ProgramsEnum::FEEDING_PROGRAM, 3);
        // $drrm_summary_three = $this->sumbyquarter(ProgramsEnum::DRRM, 3);
        // $aics_summary_three = $this->sumbyquarter(ProgramsEnum::AICS, 3);

        // $fourps_summary_four = $this->sumbyquarter(ProgramsEnum::FOURPS, 4);
        // $slp_summary_four = $this->sumbyquarter(ProgramsEnum::SLP, 4);
        // $centenarrian_summary_four = $this->sumbyquarter(ProgramsEnum::CENTENARRIAN, 4);
        // $kalahi_summary_four = $this->sumbyquarter(ProgramsEnum::KALAHI, 4);
        // $spp_summary_four = $this->sumbyquarter(ProgramsEnum::SOCIAL_PENSION_PROGRAM, 4);
        // $sfp_summary_four = $this->sumbyquarter(ProgramsEnum::FEEDING_PROGRAM, 4);
        // $drrm_summary_four = $this->sumbyquarter(ProgramsEnum::DRRM, 4);
        // $aics_summary_four = $this->sumbyquarter(ProgramsEnum::AICS, 4);

        // session(['target_progress_one' => [
        //     'fourps_summary' => $fourps_summary_one,
        //     'slp_summary' => $slp_summary_one,
        //     'centenarrian_summary' => $centenarrian_summary_one,
        //     'kalahi_summary' => $kalahi_summary_one,
        //     'spp_summary' => $spp_summary_one,
        //     'sfp_summary' => $sfp_summary_one,
        //     'drrm_summary' => $drrm_summary_one,
        //     'aics_summary' => $aics_summary_one,
        // ]]);

        // session(['target_progress_two' => [
        //     'fourps_summary' => $fourps_summary_two,
        //     'slp_summary' => $slp_summary_two,
        //     'centenarrian_summary' => $centenarrian_summary_two,
        //     'kalahi_summary' => $kalahi_summary_two,
        //     'spp_summary' => $spp_summary_two,
        //     'sfp_summary' => $sfp_summary_two,
        //     'drrm_summary' => $drrm_summary_two,
        //     'aics_summary' => $aics_summary_two,
        // ]]);

        // session(['target_progress_three' => [
        //     'fourps_summary' => $fourps_summary_three,
        //     'slp_summary' => $slp_summary_three,
        //     'centenarrian_summary' => $centenarrian_summary_three,
        //     'kalahi_summary' => $kalahi_summary_three,
        //     'spp_summary' => $spp_summary_three,
        //     'sfp_summary' => $sfp_summary_three,
        //     'drrm_summary' => $drrm_summary_three,
        //     'aics_summary' => $aics_summary_three,
        // ]]);

        // session(['target_progress_four' => [
        //     'fourps_summary' => $fourps_summary_four,
        //     'slp_summary' => $slp_summary_four,
        //     'centenarrian_summary' => $centenarrian_summary_four,
        //     'kalahi_summary' => $kalahi_summary_four,
        //     'spp_summary' => $spp_summary_four,
        //     'sfp_summary' => $sfp_summary_four,
        //     'drrm_summary' => $drrm_summary_four,
        //     'aics_summary' => $aics_summary_four,
        // ]]);


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
}
