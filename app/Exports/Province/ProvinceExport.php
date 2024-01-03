<?php

namespace App\Exports\Province;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Province\ProvinceSheet;
use App\Enums\ProgramsEnum;
class ProvinceExport implements WithMultipleSheets
{
    protected $quarterId;
    protected $year;
    protected $title;
    protected $programID;
    protected $provinceID;
    public function __construct($quarterId, $year, $province)
    {
        $this->quarterId = $quarterId;
        $this->year = $year;
        $this->provinceID = $province;
    }
    public function sheets(): array
    {
        return [
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::FOURPS, "Pantawid Pamilyang Pilipino Program", $this->provinceID),
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::SLP, "Sustainable Livelihood Program", $this->provinceID),
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::CENTENARRIAN, "Centenarian", $this->provinceID),
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::KALAHI, "Kapit Bisig Laban sa Kahirapan", $this->provinceID),
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::SOCIAL_PENSION_PROGRAM, "Social Pension Program", $this->provinceID),
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::FEEDING_PROGRAM, "Feeding Program", $this->provinceID),
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::DRRM, "Disaster Risk Reduction Management", $this->provinceID),
            new ProvinceSheet($this->quarterId, $this->year, ProgramsEnum::AICS, "Assistance to Individual in Crisis Situation", $this->provinceID)

        ];
    }
}
