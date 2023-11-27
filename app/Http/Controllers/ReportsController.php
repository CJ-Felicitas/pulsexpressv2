<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportsController extends Controller
{
    public function submitReport(Request $request)
    {
        //validate the data first before processing
        $validate = $request->validate([
            'province_id' => 'required',
            'municipality' => 'required',
            'female_count' => 'required',
            'male_count' => 'required',
            'budget_utilized' => 'required'
        ]);

        if ($validate) {
            DB::beginTransaction();

            try {
                DB::table('reports')->insert([


                ]);
            } catch (\Throwable $th) {

            }
        }
    }
}
