<?php

namespace App\Http\Controllers;

use App\Models\Benefeciary;
use Illuminate\Http\Request;
use DB;
use Symfony\Component\HttpFoundation\Response;

class SearchFunctionController extends Controller
{



    //  returns the full description of a single benefeciary
    public function name(Request $request){
        $keyword = $request->query('key', 'default');

        // Retrieves a single row
        $beneficiary = Beneficiary::where('name', '=', $keyword)->first();

        // Check if a beneficiary was found
           if ($beneficiary) {
            // Return the beneficiary data as JSON
            return response()->json($beneficiary, Response::HTTP_OK );
        } else {
            // Return a JSON response indicating no beneficiary found
            return response()->json([
                'message' => 'Beneficiary not found'
            ], Response::HTTP_NOT_FOUND);
        }

    }

    //  returns a list of benefeciaries base on their birthday
    public function birthday(Request $request){
         $keyword = $request->query('key', 'default');

         // Retrieves a list of beneficiaries with the matching birthday
         $beneficiaries = Beneficiary::where('birthday', '=', $keyword)->get();

        // Check if a beneficiary was found
           if ($beneficiaries) {
            // Return the beneficiary data as JSON
            return response()->json($beneficiaries, Response::HTTP_OK );
        } else {
            // Return a JSON response indicating no beneficiary found
            return response()->json([
                'message' => 'Beneficiaries not found'
            ], Response::HTTP_NOT_FOUND);
        }

    }


      public function province(Request $request){
        $keyword = $request->query('key', 'default');

        // Retrieves a list of beneficiaries with the matching birthday
        $beneficiaries = Beneficiary::where('province', '=', $keyword)->get();

       // Check if a beneficiary was found
          if ($beneficiaries) {
           // Return the beneficiary data as JSON
           return response()->json($beneficiaries, Response::HTTP_OK );
       } else {
           // Return a JSON response indicating no beneficiary found
           return response()->json([
            'message' => 'Beneficiaries not found'
        ], Response::HTTP_NOT_FOUND);
       }

   }

   public function municipality(Request $request){
    $keyword = $request->query('key', 'default');

    // Retrieves a list of beneficiaries with the matching birthday
    $beneficiaries = Beneficiary::where('municipality', '=', $keyword)->get();

   // Check if a beneficiary was found
      if ($beneficiaries) {
       // Return the beneficiary data as JSON
       return response()->json($beneficiaries, Response::HTTP_OK );
   } else {
       // Return a JSON response indicating no beneficiary found
       return response()->json([
        'message' => 'Beneficiaries not found'
    ], Response::HTTP_NOT_FOUND);
   }

}

public function program(Request $request){
    $keyword = $request->query('key', 'default');

    // Retrieves a list of beneficiaries with the matching birthday
    $beneficiaries = Beneficiary::where('program', '=', $keyword)->get();

   // Check if a beneficiary was found
      if ($beneficiaries) {
       // Return the beneficiary data as JSON
       return response()->json($beneficiaries, Response::HTTP_OK );
   } else {
       // Return a JSON response indicating no beneficiary found
       return response()->json([
        'message' => 'Beneficiaries not found'
    ], Response::HTTP_NOT_FOUND);
   }
}

public function getProgramData(Request $request) {
    $requestData = $request->json()->all();

    // program_id and quarter_id is required
    // auto return an error if its not validated
    $validatedData = $request->validate([
        'program_id' => 'required',
        'quarter_id' => 'required',
    ]);


    $batchLists = BatchList::where('program_id', $validatedData['program_id'])
        ->where('quarter_id', $validatedData['quarter_id'])
        ->where('amount', '>', 0)
        ->get();

    if ($batchLists->isEmpty()) {
        return response()->json([
            'message' => 'Beneficiaries not found'
        ], Response::HTTP_NOT_FOUND);
    }
    // return the batchlists as a 200 if its not empty
    return response()->json($batchLists, Response::HTTP_OK);
}

}
