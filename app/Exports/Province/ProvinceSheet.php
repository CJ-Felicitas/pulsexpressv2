<?php

namespace App\Exports\Province;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Enums\ProvinceEnum;
use App\Enums\ProgramsEnum;
use DB;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProvinceSheet implements FromCollection, WithColumnWidths, WithHeadings, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $quarterId;
    protected $year;
    protected $title;
    protected $programID;
    protected $provinceID;

    public function __construct($quarterId, $year, $programId, $title, $provinceID)
    {
        $this->provinceID = $provinceID;
        $this->quarterId = $quarterId;
        $this->year = $year;
        $this->programID = $programId;
        $this->title = $title;
    }

    public function collection()
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
            ->where('reports.quarter_id', $this->quarterId)
            ->where('reports.program_id', $this->programID)
            ->where('reports.year', $this->year)
            ->where('municipalities.province_id', $this->provinceID)
            ->groupBy('municipalities.municipality')
            ->get();

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
