<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ProgramsEnum;
use App\Enums\ProvinceEnum;
use Symfony\Component\HttpFoundation\Response;
use DB;
use App\Http\Requests\Register;

class OverviewController extends Controller
{

    public function get_program_overview(Request $request)
    {
        // query keywords from the frontend
        $quarter = $request->query("quarter");
        $program = intval($request->query("program"));

        $province = null;
        $program_name = "";
        /**
         * this provinces will be initially assigned as null values
         because they will reassigned later with actual values.
         These variables will hold an array that will be sent back
         as a response to the frontend.
         */
        $davao_de_oro = null;
        $davao_occidental = null;
        $davao_del_norte = null;
        $davao_del_sur = null;
        $davao_oriental = null;
        $davao_city = null;


        if ($program === ProgramsEnum::AICS) {
            $program_name = "Assistance to Individuals in Crisis Situation";
        } elseif ($program === ProgramsEnum::DRRM) {
            $program_name = "Disaster Risk Reduction Management";
        } elseif ($program === ProgramsEnum::FEEDING_PROGRAM) {
            $program_name = "Supplementary Feeding Program";
        } elseif ($program === ProgramsEnum::FOURPS) {
            $program_name = "Pantawid Pamilyang Pilipino Program";
        } elseif ($program === ProgramsEnum::KALAHI) {
            $program_name = "Kapit Bisig Laban sa Kahirapan";
        } elseif ($program === ProgramsEnum::SLP) {
            $program_name = "Sustainable Livelihood Program";
        } elseif ($program === ProgramsEnum::SOCIAL_PENSION_PROGRAM) {
            $program_name = "Social Pension Program";
        } elseif ($program === ProgramsEnum::CENTENARRIAN) {
            $program_name = "Centenarrian Program";
        }

        /**
         * In here we are performing a loop 6 times since there is 6 provinces
         */
        try {
            for ($i = 0; $i < 6; $i++) {
                if ($i === 0) {
                    $province = ProvinceEnum::DAVAO_ORIENTAL;
                } else if ($i === 1) {
                    $province = ProvinceEnum::DAVAO_DE_ORO;
                } else if ($i === 2) {
                    $province = ProvinceEnum::DAVAO_OCCIDENTAL;
                } else if ($i === 3) {
                    $province = ProvinceEnum::DAVAO_DEL_NORTE;
                } else if ($i === 4) {
                    $province = ProvinceEnum::DAVAO_DEL_SUR;
                } else if ($i === 5) {
                    $province = ProvinceEnum::DAVAO_CITY;
                }

                // counts the total number of male in the program and quarter
                $male_count = DB::table('batch_list')
                    ->join('beneficiaries', 'batch_list.beneficiary_id', '=', 'beneficiaries.id')
                    ->where('beneficiaries.gender', 'male')
                    ->where('batch_list.program_id', $program)
                    ->where('batch_list.province_id', $province)
                    ->where('batch_list.quarter_id', $quarter)
                    ->count();

                // counts the total number of female in the program and quarter
                $female_count = DB::table('batch_list')
                    ->join('beneficiaries', 'batch_list.beneficiary_id', '=', 'beneficiaries.id')
                    ->where('beneficiaries.gender', 'female')
                    ->where('batch_list.quarter_id', $quarter)
                    ->where('batch_list.province_id', $province)
                    ->where('batch_list.program_id', $program)
                    ->count();

                // counts the total physical count on a specific quarter
                $total_physical_count = DB::table('batch_list')
                    ->where('quarter_id', $quarter)
                    ->where('province_id', $province)
                    ->where('program_id', $program)
                    ->count();

                // calculates the total amount of all rows in the table under the specific program
                $totalAmount = DB::table('batch_list')
                    ->where('province_id', $province)
                    ->where('quarter_id', $quarter)
                    ->where('program_id', $program)
                    ->sum('amount');

                /**
                 * In here we are starting to assign the values to each province
                 */
                if ($i === 0) {
                    $davao_oriental = [
                        'province_name' => 'Davao Oriental',
                        'male_count' => $male_count,
                        'female_count' => $female_count,
                        'total_physical_count' => $total_physical_count,
                        'totalAmount' => $totalAmount,
                    ];
                } else if ($i === 1) {
                    $davao_de_oro = [
                        'province_name' => 'Davao De Oro',
                        'male_count' => $male_count,
                        'female_count' => $female_count,
                        'total_physical_count' => $total_physical_count,
                        'totalAmount' => $totalAmount,
                    ];
                } else if ($i === 2) {
                    $davao_occidental = [
                        'province_name' => 'Davao Occidental',
                        'male_count' => $male_count,
                        'female_count' => $female_count,
                        'total_physical_count' => $total_physical_count,
                        'totalAmount' => $totalAmount,
                    ];
                } else if ($i === 3) {
                    $davao_del_norte = [
                        'province_name' => 'Davao Del Norte',
                        'male_count' => $male_count,
                        'female_count' => $female_count,
                        'total_physical_count' => $total_physical_count,
                        'totalAmount' => $totalAmount,
                    ];
                } else if ($i === 4) {
                    $davao_del_sur = [
                        'province_name' => 'Davao Del Sur',
                        'male_count' => $male_count,
                        'female_count' => $female_count,
                        'total_physical_count' => $total_physical_count,
                        'totalAmount' => $totalAmount,
                    ];
                } else if ($i === 5) {
                    $davao_city = [
                        'province_name' => 'Davao City',
                        'male_count' => $male_count,
                        'female_count' => $female_count,
                        'total_physical_count' => $total_physical_count,
                        'totalAmount' => $totalAmount,
                    ];
                }

            }
            //  end of loop
            /**
             * wrap all of the provinces in an another single array that
             * will serve as a json response in the frontend.
             */
            $responseData = [
                'program_name' => $program_name,
                'davao_de_oro' => $davao_de_oro,
                'davao_occidental' => $davao_occidental,
                'davao_del_norte' => $davao_del_norte,
                'davao_del_sur' => $davao_del_sur,
                'davao_oriental' => $davao_oriental,
                'davao_city' => $davao_city
            ];
            /**
             * returns the data as a json response if the request is
             * successful.
             */
            return response()->json([
                'message' => 'ok',
                'data' => $responseData
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            // For backend debugging purposes only
            return $th;
        }
    }

    public function getGrandTotalAmountForQuarter(Request $request)
    {
        $quarter = $request->query('quarter');

        try {
            // calculates the total funds used for a specific quarter
            $grand_total_amount = DB::table('batch_list')
                ->where('quarter_id', $quarter)
                ->sum('amount');

            $responseData = [
                'grand_total_amount' => $grand_total_amount
            ];

            return response()->json([
                'message' => 'ok',
                'data' => $responseData
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            return $th;
        }

    }




}
