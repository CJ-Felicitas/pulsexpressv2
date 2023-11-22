<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['type'=> 'admin'],
            ['type' => 'guest'],
            ['type' => 'tester'],
            ['type'=> 'program'],
            ['type'=> 'fourps'],
            ['type'=> 'kalahi'],
            ['type'=> 'slp'],
            ['type'=> 'drrm'],
            ['type'=> 'feeding_program'],
            ['type'=> 'social_pension_program'],
            ['type'=> 'centenarrian'],
            ['type'=> 'aics'],
    ];

    DB::table('user_type')->upsert($data, ['type'], ['type']);
    }
}
