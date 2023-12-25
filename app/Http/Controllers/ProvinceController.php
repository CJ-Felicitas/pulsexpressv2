<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Enums\ProvinceEnum;
use App\Enums\ProgramsEnum;
use App\Enums\QuartersEnum;
use App\Enums\SemestersEnum;
use Carbon\Carbon;

class ProvinceController extends Controller
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
                'provincedata' => [
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


        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
