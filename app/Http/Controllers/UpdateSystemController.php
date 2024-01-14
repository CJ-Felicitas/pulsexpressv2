<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Enums\UserTypeEnum;
class UpdateSystemController extends Controller

{
    public function returnview(){
        $this->updateQuarter();
        return view('login');
    }

    private function updateQuarter(){
          // mapping the quarter that will get the previous active quarter
          $quarterMapping = [
            1 => 4,
            2 => 1,
            3 => 2,
            4 => 3,
        ];

        // get the current active quarter for the current year
        $current_active_quarter = DB::table('quarters')->where('active', 1)->first();

        // assign the map
        $previous_quarter = $quarterMapping[$current_active_quarter->quarter];

        \Log::info('CHECK ME OUT: ' . $previous_quarter);

        // gets the current date 
        $now = Carbon::now('Asia/Manila');

        // check and updates the quarter base on the date on which a quarter belongs
        $firstQuarterEnd = Carbon::create(null, 4, 6, 0, 0, 0, 'Asia/Manila');
        $secondQuarterEnd = Carbon::create(null, 7, 6, 0, 0, 0, 'Asia/Manila');
        $thirdQuarterEnd = Carbon::create(null, 10, 6, 0, 0, 0, 'Asia/Manila');
        $fourthQuarterEnd = Carbon::create(null, 1, 6, 0, 0, 0, 'Asia/Manila')->addYear();
        
        // First, set all quarters to inactive
        DB::table('quarters')->update(['active' => 0]);

        if ($now->month == 1 && $now->day <= 5) {
            DB::table('quarters')->where('quarter', 4)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($firstQuarterEnd)) {
            DB::table('quarters')->where('quarter', 1)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($secondQuarterEnd)) {
            DB::table('quarters')->where('quarter', 2)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($thirdQuarterEnd)) {
            DB::table('quarters')->where('quarter', 3)->update(['active' => 1]);
        } elseif ($now->lessThanOrEqualTo($fourthQuarterEnd) || ($now->month == 1 && $now->day <= 5)) {
            DB::table('quarters')->where('quarter', 4)->update(['active' => 1]);
        } else {
            // If the date is beyond January 5, it belongs to the first quarter of the next year
            DB::table('quarters')->where('quarter', 1)->update(['active' => 1]);
        }
    }

  



}
