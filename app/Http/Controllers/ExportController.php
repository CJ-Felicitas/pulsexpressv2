<?php

namespace App\Http\Controllers;

use App\Enums\QuartersEnum;
use App\Enums\SemestersEnum;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\YourExport;
// use App\Enums\ProvinceEnum;
// use App\Enums\ProgramsEnum;
// use App\Exports\TestExport;
// use App\Exports\General\FirstQuarter\GeneralFirstQuarter;
use App\Exports\General\GeneralExport;
use App\Exports\General\SemesterExport;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function generalfirstquarter(){
        return Excel::download(new GeneralExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year), 'General_First_Quarter.xlsx');
    }
    public function generalsecondquarter(){
        return Excel::download(new GeneralExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year), 'General_Second_Quarter.xlsx');
    }
    public function generalthirdquarter(){
        return Excel::download(new GeneralExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year), 'General_Third_Quarter.xlsx');
    }
    public function generalfourthquarter(){
        return Excel::download(new GeneralExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year), 'General_Fourth_Quarter.xlsx');
    }
    public function generalfirstsemester(){
        return Excel::download(new SemesterExport(SemestersEnum::FIRST_SEMESTER, Carbon::now()->year), 'General_First_Semester.xlsx');
    }
    public function generalsecondsemester(){
        return Excel::download(new SemesterExport(SemestersEnum::SECOND_SEMESTER, Carbon::now()->year), 'General_Second_Semester.xlsx');
    }
}
