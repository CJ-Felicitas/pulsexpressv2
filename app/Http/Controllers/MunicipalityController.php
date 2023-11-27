<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MunicipalityController extends Controller
{
    public function getMunicipalities($provinceId)
    {
        $municipalities = DB::table('municipalities')
            ->where('province_id', $provinceId)
            ->get();

        return response()->json($municipalities);
    }
}
