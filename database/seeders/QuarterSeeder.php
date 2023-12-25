<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class QuarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['quarter' => 1, 'active' => 1], // Manually set first quarter to active: 1
            ['quarter' => 2, 'active' => 0], // Manually set rest of the quarters to active: 0
            ['quarter' => 3, 'active' => 0],
            ['quarter' => 4, 'active' => 0]
        ];


        DB::table('quarters')->upsert($data, ['quarter'], ['quarter', 'active']);
    }
}
