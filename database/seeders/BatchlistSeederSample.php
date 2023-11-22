<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;
class BatchlistSeederSample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=0; $i < 100 ; $i++) {
        //     $faker = Faker::create();
        //     $data = [
        //         'beneficiary_id' => $faker->numberBetween(1, 40),
        //         'program_id' => $faker->numberBetween(1, 8),
        //         'province_id' => $faker->numberBetween(1, 6),
        //         'municipality_id' => $faker->numberBetween(1, 48),
        //         'year_released' => $faker->numberBetween(2022, 2023),
        //         'month' => $faker->numberBetween(1, 12),
        //         'quarter_id' => $faker->numberBetween(1, 4),
        //         'amount' => $faker->numberBetween(4000, 5000),
        //         // 'outcome_indicator_id' => $faker->numberBetween(1, 4)
        //     ];

        //     DB::table('batch_list')->insert($data);
        // }

    }
}
