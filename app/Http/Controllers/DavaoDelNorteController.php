<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enums\ProvinceEnum;
use App\Enums\ProgramsEnum;
use App\Enums\QuartersEnum;

use DB;
use Carbon\Carbon;
class DavaoDelNorteController extends Controller
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

    public function davaodelnortefirstquarter(Request $request)
    {
        try {
            $q = QuartersEnum::FIRST_QUARTER;
            $p = ProvinceEnum::DAVAO_DEL_NORTE;
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
                'ddn_one' => [
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
            return view('admin.provinces.davaodelnorte.firstquarter', ['ddn_one' => session('ddn_one')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function davaodelnortesecondquarter(Request $request)
    {
        try {
            $q = QuartersEnum::SECOND_QUARTER;
            $p = ProvinceEnum::DAVAO_DEL_NORTE;
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
                'ddn_two' => [
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
            return view('admin.provinces.davaodelnorte.secondquarter', ['ddn_two' => session('ddn_two')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function davaodelnortethirdquarter(Request $request)
    {
        try {
            $q = QuartersEnum::THIRD_QUARTER;
            $p = ProvinceEnum::DAVAO_DEL_NORTE;
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
                'ddn_three' => [
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
            return view('admin.provinces.davaodelnorte.thirdquarter', ['ddn_three' => session('ddn_three')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function davaodelnortefourthquarter(Request $request)
    {
        try {
            $q = QuartersEnum::FOURTH_QUARTER;
            $p = ProvinceEnum::DAVAO_DEL_NORTE;
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
                'ddn_four' => [
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
            return view('admin.provinces.davaodelnorte.fourthquarter', ['ddn_four' => session('ddn_four')]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
