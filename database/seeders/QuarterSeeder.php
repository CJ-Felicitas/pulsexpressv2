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
            ['quarter' => 1, 'active' => 1], // First quarter set to active: 1
            ['quarter' => 2], // Rest of the quarters will use default value (likely 0)
            ['quarter' => 3],
            ['quarter' => 4]
        ];

        DB::table('quarters')->upsert($data, ['quarter'], ['quarter', 'active']);
    }
}
