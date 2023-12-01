<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Enums\ProvinceEnum;
use App\Enums\ProgramsEnum;
use App\Enums\QuartersEnum;

use Carbon\Carbon;

class DavaoDeOroController extends Controller
{
    private function getProvinceData($programId, $quarterId, $year, $provinceId)
    {
        $data = DB::table('reports')
            ->select(
                'municipalities.municipality as municipality',
                DB::raw('SUM(male_count) as total_male_count'),
                DB::raw('SUM(female_count) as total_female_count'),
                DB::raw('SUM(male_count + female_count) as total_physical_count'),
                DB::raw('SUM(total_budget_utilized) as total_budget_utilized')
            )
            ->join('municipalities', 'reports.municipality_id', '=', 'municipalities.id')
            ->where('reports.quarter_id', $quarterId)
            ->where('reports.program_id', $programId)
            ->where('reports.year', $year)
            ->where('municipalities.province_id', $provinceId)
            ->groupBy('municipalities.municipality')
            ->get();

        return $data;
    }

    public function davaodeorofirstquarter(Request $request)
    {
        try {
            $fourps = $this->getProvinceData(ProgramsEnum::FOURPS, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);
            $slp = $this->getProvinceData(ProgramsEnum::SLP, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);
            $kalahi = $this->getProvinceData(ProgramsEnum::KALAHI, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);
            $spp = $this->getProvinceData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);
            $sfp = $this->getProvinceData(ProgramsEnum::FEEDING_PROGRAM, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);
            $drrm = $this->getProvinceData(ProgramsEnum::DRRM, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);
            $centenarrian = $this->getProvinceData(ProgramsEnum::CENTENARRIAN, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);
            $aics = $this->getProvinceData(ProgramsEnum::AICS, QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO);

            session([
                'ddo_one' => [
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
            //  for debugging purposes only
            // return response()->json([
            //     'message' => $fourps
            // ]);
            return view('admin.provinces.davaodeoro.firstquarter', ['ddo_one' => session('ddo_one')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function davaodeorosecondquarter(Request $request)
    {
        try {
            $q = QuartersEnum::SECOND_QUARTER;
            $p = ProvinceEnum::DAVAO_DE_ORO;
            $y = Carbon::now()->year;
            $fourps = $this->getProvinceData(ProgramsEnum::FOURPS, $q, $y, $p);
            $slp = $this->getProvinceData(ProgramsEnum::SLP, $q, Carbon::now()->year, $p);
            $kalahi = $this->getProvinceData(ProgramsEnum::KALAHI, $q, $y, $p);
            $spp = $this->getProvinceData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, $q, $y, $p);
            $sfp = $this->getProvinceData(ProgramsEnum::FEEDING_PROGRAM, $q, $y, $p);
            $drrm = $this->getProvinceData(ProgramsEnum::DRRM, $q, $y, $p);
            $centenarrian = $this->getProvinceData(ProgramsEnum::CENTENARRIAN, $q, $y, $p);
            $aics = $this->getProvinceData(ProgramsEnum::AICS, $q, $y, $p);

            session([
                'ddo_two' => [
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
            //  for debugging purposes only
            // return response()->json([
            //     'message' => $fourps
            // ]);
            return view('admin.provinces.davaodeoro.secondquarter', ['ddo_two' => session('ddo_two')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function davaodeorothirdquarter(Request $request)
    {
        try {
            $q = QuartersEnum::THIRD_QUARTER;
            $p = ProvinceEnum::DAVAO_DE_ORO;
            $y = Carbon::now()->year;
            $fourps = $this->getProvinceData(ProgramsEnum::FOURPS, $q, $y, $p);
            $slp = $this->getProvinceData(ProgramsEnum::SLP, $q, Carbon::now()->year, $p);
            $kalahi = $this->getProvinceData(ProgramsEnum::KALAHI, $q, $y, $p);
            $spp = $this->getProvinceData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, $q, $y, $p);
            $sfp = $this->getProvinceData(ProgramsEnum::FEEDING_PROGRAM, $q, $y, $p);
            $drrm = $this->getProvinceData(ProgramsEnum::DRRM, $q, $y, $p);
            $centenarrian = $this->getProvinceData(ProgramsEnum::CENTENARRIAN, $q, $y, $p);
            $aics = $this->getProvinceData(ProgramsEnum::AICS, $q, $y, $p);

            session([
                'ddo_three' => [
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
            //  for debugging purposes only
            // return response()->json([
            //     'message' => $fourps
            // ]);
            return view('admin.provinces.davaodeoro.thirdquarter', ['ddo_three' => session('ddo_three')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function davaodeorofourthquarter(Request $request)
    {
        try {
            $q = QuartersEnum::THIRD_QUARTER;
            $p = ProvinceEnum::DAVAO_DE_ORO;
            $y = Carbon::now()->year;
            $fourps = $this->getProvinceData(ProgramsEnum::FOURPS, $q, $y, $p);
            $slp = $this->getProvinceData(ProgramsEnum::SLP, $q, Carbon::now()->year, $p);
            $kalahi = $this->getProvinceData(ProgramsEnum::KALAHI, $q, $y, $p);
            $spp = $this->getProvinceData(ProgramsEnum::SOCIAL_PENSION_PROGRAM, $q, $y, $p);
            $sfp = $this->getProvinceData(ProgramsEnum::FEEDING_PROGRAM, $q, $y, $p);
            $drrm = $this->getProvinceData(ProgramsEnum::DRRM, $q, $y, $p);
            $centenarrian = $this->getProvinceData(ProgramsEnum::CENTENARRIAN, $q, $y, $p);
            $aics = $this->getProvinceData(ProgramsEnum::AICS, $q, $y, $p);

            session([
                'ddo_four' => [
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
            //  for debugging purposes only
            // return response()->json([
            //     'message' => $fourps
            // ]);
            return view('admin.provinces.davaodeoro.fourthquarter', ['ddo_four' => session('ddo_four')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
