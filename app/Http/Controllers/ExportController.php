<?php

namespace App\Http\Controllers;

use App\Enums\QuartersEnum;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExport;
use App\Enums\ProvinceEnum;
use App\Enums\ProgramsEnum;
use App\Exports\GeneralFirstQuarter;
use App\Exports\TestExport;
use App\Exports\General\FirstQuarter\FourpsExport;
class ExportController extends Controller
{
    // sample export function
    // public function exportData()
    // {
    //     // Your database query using the query builder
    //     $data = DB::table('provinces')
    //         ->select('name')
    //         ->get();
    //     // Export data to Excel using Laravel Excel
    //     return Excel::download(new YourExport($data), 'filename.xlsx');
    // }

    // public function generalFirstQuarter()
    // {
    //     // Your data to be sent to the export class
    //     $dataForSheet1 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::FOURPS);
    //     // // $dataForSheet2 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::KALAHI)->toArray();
    //     // $dataForSheet3 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::SLP)->toArray();
    //     // $dataForSheet4 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::SOCIAL_PENSION_PROGRAM)->toArray();
    //     // $dataForSheet5 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::FEEDING_PROGRAM)->toArray();
    //     // $dataForSheet6 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::DRRM)->toArray();
    //     // $dataForSheet7 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::AICS)->toArray();
    //     // $dataForSheet8 = $this->generalexport(QuartersEnum::FIRST_QUARTER, 2023, ProgramsEnum::CENTENARRIAN)->toArray();

    //     // Create an instance of the export class and pass data through the constructor
    //     // $export = new GeneralFirstQuarter($dataForSheet1, $dataForSheet2, $dataForSheet3, $dataForSheet4, $dataForSheet5, $dataForSheet6, $dataForSheet7, $dataForSheet8);

    //     // $export = new GeneralFirstQuarter($dataForSheet1, $dataForSheet3);


    //     // Export the data to Excel
    //     // return Excel::download(new GeneralFirstQuarter($dataForSheet1, $dataForSheet3), 'multiple_sheets.xlsx');
    //     return Excel::download(new YourExport($dataForSheet1), 'yawa.xlsx');
    // }

    // private function generalexport($quarterId, $year, $programId)
    // {
    //     $data = DB::table('reports')
    //     ->select(
    //         'province_id',
    //         DB::raw('SUM(male_count) as total_male_count'),
    //         DB::raw('SUM(female_count) as total_female_count'),
    //         DB::raw('SUM(male_count + female_count) as total_physical_count'),
    //         DB::raw('SUM(total_budget_utilized) as total_budget_utilized')
    //     )
    //     ->where('quarter_id', $quarterId)
    //     ->where('program_id', $programId)
    //     ->where('year', $year)
    //     ->groupBy('province_id')
    //     ->get();

    // // foreach ($data as $item) {
    // //     switch ($item->province_id) {
    // //         case ProvinceEnum::DAVAO_CITY:
    // //             $item->province_id = 'Davao City';
    // //             break;
    // //         case ProvinceEnum::DAVAO_DE_ORO:
    // //             $item->province_id = 'Davao De Oro';
    // //             break;
    // //         case ProvinceEnum::DAVAO_DEL_NORTE:
    // //             $item->province_id = 'Davao Del Norte';
    // //             break;
    // //         case ProvinceEnum::DAVAO_DEL_SUR:
    // //             $item->province_id = 'Davao Del Sur';
    // //             break;
    // //         case ProvinceEnum::DAVAO_OCCIDENTAL:
    // //             $item->province_id = 'Davao Occidental';
    // //             break;
    // //         case ProvinceEnum::DAVAO_ORIENTAL:
    // //             $item->province_id = 'Davao Oriental';
    // //             break;
    // //     }
    // // }
    // return $data;
    // }

    // // real shit starts here
    // public function exportshit(){
    //     return Excel::download(new TestExport(), 'fuck.xlsx');
    // }

    public function generalfourpsfirstquarter(){
        return Excel::download(new FourpsExport(1, 2023), 'check.xlsx');
    }

}
