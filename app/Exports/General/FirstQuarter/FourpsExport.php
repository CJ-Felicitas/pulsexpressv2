<?php

namespace App\Exports\General\FirstQuarter;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Enums\ProvinceEnum;
use DB;
use App\Enums\ProgramsEnum;

class FourpsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $quarterId;
    protected $year;

    public function __construct($quarterId, $year)
    {
        $this->quarterId = $quarterId;
        $this->year = $year;
    }

    public function collection()
    {
        $data = DB::table('reports')
            ->select(
                'province_id',
                DB::raw('SUM(male_count) as total_male_count'),
                DB::raw('SUM(female_count) as total_female_count'),
                DB::raw('SUM(male_count + female_count) as total_physical_count'),
                DB::raw('SUM(total_budget_utilized) as total_budget_utilized')
            )
            ->where('quarter_id', 4)
            ->where('program_id', ProgramsEnum::FOURPS)
            ->where('year', 2023)
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
