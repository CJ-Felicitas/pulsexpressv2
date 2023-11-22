<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class BenefeciarySampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=0 ; $i < 100 ; $i++ ) {
        //     $faker = Faker::create();

        //     $data = [
        //         [
        //          'first_name' => 'Cedrick James'
        //          'middle_name' => $faker->lastName,
        //          'last_name' => $faker->lastName,
        //          'suffix' => $faker->suffix,
        //          'prefix' => $faker->title,
        //          'email' => $faker->email,
        //          'birth_year' => $faker->numberBetween(1950, 2000),
        //          'birth_month' => $faker->numberBetween(1,12),
        //          'birth_day' => $faker->numberBetween(1,28),
        //         //  'region' => $faker->city,
        //         //  'province_id' => rand(1,6),
        //         //  'municipality_id' => rand(1, 48),
        //         //  'barangay_id' => rand(1,24)
        //         //  'purok'=> $faker->streetName,
        //         //  'subdivision' => $faker->streetName
        //         'gender'=> 'female'
        //         ],

        //     ];

        //     // DB::table('beneficiaries')->upsert($data, ['email'], ['first_name', 'middle_name', 'last_name', 'suffix','prefix','email','birth_year','birth_month','birth_day', 'province_id', 'municipality_id']);

        //     //bugfix gender count
        //     DB::table('beneficiaries')->upsert($data, ['email'], ['first_name', 'middle_name', 'last_name', 'suffix','prefix','email','birth_year','birth_month','birth_day']);

        // }

    }
}
