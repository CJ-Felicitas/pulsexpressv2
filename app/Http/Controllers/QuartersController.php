<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuartersController extends Controller
{
    public function firstquarter(Request $request)
    {
        $validate = $request->validate([
            "firstquarter" => 'required',
        ]);

        if ($validate) {
            try {
                DB::beginTransaction();
                // set to inactive first before setting another one
                DB::table('quarters')->update(['active' => 0]);

                DB::table('quarters')
                    ->where('id', $validate['firstquarter'])
                    ->update([
                        'active' => 1,
                        // Add more columns and new values as needed
                    ]);
                DB::commit();
                return redirect()->back()->with('success', 'Quarter status updated successfully');

            } catch (\Throwable $th) {

                throw $th;
            }
        }
    }

    public function secondquarter(Request $request)
    {
        $validate = $request->validate([
            "secondquarter" => 'required',
        ]);

        if ($validate) {
            try {
                DB::beginTransaction();
                // set to inactive first before setting another one
                DB::table('quarters')->update(['active' => 0]);

                DB::table('quarters')
                    ->where('id', $validate['secondquarter'])
                    ->update([
                        'active' => 1,
                        // Add more columns and new values as needed
                    ]);
                DB::commit();
                return redirect()->back()->with('success', 'Quarter status updated successfully');

            } catch (\Throwable $th) {

                throw $th;
            }
        }
    }

    public function thirdquarter(Request $request)
    {
        $validate = $request->validate([
            "thirdquarter" => 'required',
        ]);

        if ($validate) {
            try {
                DB::beginTransaction();
                // set to inactive first before setting another one
                DB::table('quarters')->update(['active' => 0]);

                DB::table('quarters')
                    ->where('id', $validate['thirdquarter'])
                    ->update([
                        'active' => 1,
                        // Add more columns and new values as needed
                    ]);
                DB::commit();
                return redirect()->back()->with('success', 'Quarter status updated successfully');

            } catch (\Throwable $th) {

                throw $th;
            }
        }
    }

    public function fourthquarter(Request $request)
    {
        $validate = $request->validate([
            "fourthquarter" => 'required',
        ]);

        if ($validate) {
            try {
                DB::beginTransaction();
                // set to inactive first before setting another one
                DB::table('quarters')->update(['active' => 0]);

                DB::table('quarters')
                    ->where('id', $validate['fourthquarter'])
                    ->update([
                        'active' => 1,
                        // Add more columns and new values as needed
                    ]);
                DB::commit();
                return redirect()->back()->with('success', 'Quarter status updated successfully');

            } catch (\Throwable $th) {

                throw $th;
            }
        }
    }

}
