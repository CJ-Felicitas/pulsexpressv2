<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExport;
use App\Enums\ProvinceEnum;
class ExportController extends Controller
{
    // sample export function
    public function exportData()
    {
        // Your database query using the query builder
        $data = DB::table('provinces')
            ->select('name')
            ->get();
        // Export data to Excel using Laravel Excel
        return Excel::download(new YourExport($data), 'filename.xlsx');
    }

    private function generalexport($quarterId, $year)
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
        // ->where('program_id', $programId)
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
}
