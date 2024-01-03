<?php

namespace App\Exports\General;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Enums\ProvinceEnum;
use App\Enums\ProgramsEnum;
use DB;
use Maatwebsite\Excel\Concerns\WithTitle;
class SemesterSheet implements FromCollection, WithColumnWidths, WithHeadings, WithTitle
{
     /**
     * @return \Illuminate\Support\Collection
     */

     protected $semester;
     protected $year;
     protected $title;
     protected $programID;

     public function __construct($semester, $year, $programId, $title)
     {
         $this->semester = $semester;
         $this->year = $year;
         $this->programID = $programId;
         $this->title = $title;
     }

     public function collection()
     {
        $quarters = [];
        if ($this->semester == 1) {
            $quarters = [1, 2]; // 1st and 2nd quarter for the first semester
        } elseif ($this->semester == 2) {
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
            ->where('program_id', $this->programID)
            ->where('year', $this->year)
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

     public function headings(): array
     {
         return [

             [
                 'Province',
                 'Total Male Count',
                 'Total Female Count',
                 'Total Physical Count',
                 'Total Budget Utilized'
             ]
         ];
     }

     public function columnWidths(): array
     {
         return [
             'A' => 30,
             'B' => 20,
             'C' => 20,
             'D' => 20,
             'E' => 20,
         ];
     }
     public function title(): string
     {
         return $this->title;
     }
}
