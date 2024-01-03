<?php

namespace App\Http\Controllers;

use App\Enums\QuartersEnum;
use App\Enums\SemestersEnum;
use App\Enums\ProvinceEnum;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\General\GeneralExport;
use App\Exports\General\SemesterExport;
use Carbon\Carbon;
use App\Exports\Province\ProvinceExport;

class ExportController extends Controller
{
    public function generalfirstquarter()
    {
        return Excel::download(new GeneralExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year), 'General_First_Quarter.xlsx');
    }
    public function generalsecondquarter()
    {
        return Excel::download(new GeneralExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year), 'General_Second_Quarter.xlsx');
    }
    public function generalthirdquarter()
    {
        return Excel::download(new GeneralExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year), 'General_Third_Quarter.xlsx');
    }
    public function generalfourthquarter()
    {
        return Excel::download(new GeneralExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year), 'General_Fourth_Quarter.xlsx');
    }
    public function generalfirstsemester()
    {
        return Excel::download(new SemesterExport(SemestersEnum::FIRST_SEMESTER, Carbon::now()->year), 'General_First_Semester.xlsx');
    }
    public function generalsecondsemester()
    {
        return Excel::download(new SemesterExport(SemestersEnum::SECOND_SEMESTER, Carbon::now()->year), 'General_Second_Semester.xlsx');
    }

    // provinces export
    // davao De Oro
    public function davaodeorofirstquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO), 'DavaoDeOro_First_Quarter.xlsx', );
    }

    public function davaodeorosecondquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO), 'DavaoDeOro_Second_Quarter.xlsx', );
    }

    public function davaodeorothirdquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO), 'DavaoDeOro_Third_Quarter.xlsx', );
    }
    public function davaodeorofourthquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DE_ORO), 'DavaoDeOro_Fourth_Quarter.xlsx', );
    }


    // =======================================================================================
    // Davao Occidental
    public function davaooccidentalfirstquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_OCCIDENTAL), 'DavaoOccidental_First_Quarter.xlsx', );
    }

    public function davaooccidentalsecondquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_OCCIDENTAL), 'DavaoOccidental_Second_Quarter.xlsx', );
    }

    public function davaooccidentalthirdquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_OCCIDENTAL), 'DavaoOccidental_Third_Quarter.xlsx', );
    }
    public function davaooccidentalfourthquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_OCCIDENTAL), 'DavaoOccidental_Fourth_Quarter.xlsx', );
    }

    // =======================================================================================
    // Davao Oriental
    public function davaoorientalfirstquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_ORIENTAL), 'Davao_Oriental_First_Quarter.xlsx', );
    }
    public function davaoorientalsecondquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_ORIENTAL), 'Davao_Oriental_Second_Quarter.xlsx', );
    }
    public function davaoorientalthirdquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_ORIENTAL), 'Davao_Oriental_Third_Quarter.xlsx', );
    }
    public function davaoorientalfourthquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_ORIENTAL), 'Davao_Oriental_Fourth_Quarter.xlsx', );
    }


    // =======================================================================================
    // Davao Del Sur
    public function davaodelsurfirstquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_SUR), 'Davao_Del_Sur_First_Quarter.xlsx', );
    }
    public function davaodelsursecondquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_SUR), 'Davao_Del_Sur_Second_Quarter.xlsx', );
    }
    public function davaodelsurthirdquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_SUR), 'Davao_Del_Sur_Third_Quarter.xlsx', );
    }
    public function davaodelsurfourthquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_SUR), 'Davao_Del_Sur_Fourth_Quarter.xlsx', );
    }

    // =======================================================================================
    // Davao Del Norte
    public function davaodelnortefirstquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_NORTE), 'Davao_Del_Norte_First_Quarter.xlsx', );
    }
    public function davaodelnortesecondquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_NORTE), 'Davao_Del_Norte_Second_Quarter.xlsx', );
    }
    public function davaodelnortethirdquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_NORTE), 'Davao_Del_Norte_Third_Quarter.xlsx', );
    }
    public function davaodelnortefourthquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_DEL_NORTE), 'Davao_Del_Norte_Fourth_Quarter.xlsx', );
    }

    // =======================================================================================
    // Davao City
    public function davaocityfirstquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FIRST_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_CITY), 'Davao_City_First_Quarter.xlsx', );
    }
    public function davaocitysecondquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::SECOND_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_CITY), 'Davao_City_Second_Quarter.xlsx', );
    }
    public function davaocitythirdquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::THIRD_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_CITY), 'Davao_City_Third_Quarter.xlsx', );
    }
    public function davaocityfourthquarter()
    {
        return Excel::download(new ProvinceExport(QuartersEnum::FOURTH_QUARTER, Carbon::now()->year, ProvinceEnum::DAVAO_CITY), 'Davao_City_Fourth_Quarter.xlsx', );
    }



}
