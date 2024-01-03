<?php

namespace App\Exports\General;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\General\SemesterSheet;
use App\Enums\ProgramsEnum;

class SemesterExport implements WithMultipleSheets
{
    protected $semester;
    protected $year;
    protected $title;

    public function __construct($semester, $year)
    {
        $this->semester = $semester;
        $this->year = $year;

    }
    public function sheets(): array
    {
        return [
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::FOURPS, "Pantawid Pamilyang Pilipino Program"),
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::SLP, "Sustainable Livelihood Program"),
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::CENTENARRIAN, "Centenarian"),
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::KALAHI, "Kapit Bisig Laban sa Kahirapan"),
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::SOCIAL_PENSION_PROGRAM, "Social Pension Program"),
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::FEEDING_PROGRAM, "Feeding Program"),
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::DRRM, "Disaster Risk Reduction Management"),
            new SemesterSheet($this->semester, $this->year, ProgramsEnum::AICS, "Assistance to Individual in Crisis Situation")
        ];
    }
}
