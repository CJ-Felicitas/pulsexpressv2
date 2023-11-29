<?php

namespace App\Http\Controllers;

use App\Enums\ProgramsEnum;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Enums\ProvinceEnum;
use App\Enums\QuartersEnum;
use App\Enums\SemestersEnum;
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
}
