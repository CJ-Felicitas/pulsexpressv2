<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Register;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\ProgramsEnum;
use DB;

class RegistrationController extends Controller
{
    public function register(Register $request)
    {
        // fetches all of the data then validates in the Register.php
        $validated = $request->validated();

        // checks if there is an existing benefeciary
        $existing_user = DB::table('beneficiaries')
            ->where('email', $validated['email'])
            ->where('last_name', $validated['last_name'])
            ->where('first_name', $validated['first_name'])
            ->first();


        if (!$existing_user) {
            DB::beginTransaction();
            try {
                DB::table('beneficiaries')->insert($validated);

                // $get_beneficiary = DB::table('beneficiaries')
                // ->where('email', $validated['email'])
                // ->where('last_name', $validated['last_name'])
                // ->where('first_name', $validated['first_name'])
                // ->first();

                // $beneficiary_id = $get_beneficiary->id;
                // $data = [
                //     'beneficiary_id' => $beneficiary_id,
                //     'program_id' => ProgramsEnum::FOURPS,
                //     'created_at' => now()
                // ];
                // DB::table('registered_beneficiaries')->insert($data);
                DB::commit();


                return response()->json([
                    'message' => 'ok',
                    'http_response' => Response::HTTP_OK
                ], Response::HTTP_OK);

            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        } else if($existing_user) {
            return response()->json([
                'message'=> 'benefeciary is already registered',
                'http_response'=> Response::HTTP_UNPROCESSABLE_ENTITY
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

}
