<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['district' => '1'],
            ['district' => '2'],
            ['district' => '3'],
            ['district' => '4']
         ];

        DB::table('districts')->upsert($data, ['district'], ['district']);
    }
}
