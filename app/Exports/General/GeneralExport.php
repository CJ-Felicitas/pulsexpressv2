<?php

namespace App\Exports\General;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\General\ProgramSheet;
use App\Enums\ProgramsEnum;
class GeneralExport implements WithMultipleSheets
{

    protected $quarterId;
    protected $year;
    protected $title;
    protected $programID;
    public function __construct($quarterId, $year)
    {
        $this->quarterId = $quarterId;
        $this->year = $year;

    }
    public function sheets(): array
    {
        return [
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::FOURPS, "Pantawid Pamilyang Pilipino Program"),
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::SLP, "Sustainable Livelihood Program"),
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::CENTENARRIAN, "Centenarian"),
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::KALAHI, "Kapit Bisig Laban sa Kahirapan"),
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::SOCIAL_PENSION_PROGRAM, "Social Pension Program"),
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::FEEDING_PROGRAM, "Feeding Program"),
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::DRRM, "Disaster Risk Reduction Management"),
            new ProgramSheet($this->quarterId, $this->year, ProgramsEnum::AICS, "Assistance to Individual in Crisis Situation")

        ];
    }
}
