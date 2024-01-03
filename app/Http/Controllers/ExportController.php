<?php

namespace App\Http\Controllers;

use App\Enums\QuartersEnum;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExport;
use App\Enums\ProvinceEnum;
use App\Enums\ProgramsEnum;
use App\Exports\TestExport;
use App\Exports\General\FirstQuarter\GeneralFirstQuarter;
use App\Exports\General\GeneralExport;
use Carbon\Carbon;
class ExportController extends Controller
{
    public function generalfirstquarter(){
        return Excel::download(new GeneralExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year), 'General_First_Quarter.xlsx');
    }

}
