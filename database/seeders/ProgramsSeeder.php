<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Pantawid Pamilyang Pilipino Program'],
            ['name' => 'Sustainable Livelihood Program'],
            ['name' => 'Pantawid Pamilyang Pilipino Program'],
            ['name' => 'Kapit Bisig Laban Sa Kahirapan'],
            ['name' => 'Social Pension Program'],
            ['name' => 'Supplementary Feeding Program'],
            ['name' => 'Disaster Risk Reduction And Management'],
            ['name' => 'Assistance To Individuals In Crisis Situations'],
        ];
        
        DB::table('programs')->upsert($data, ['name'], ['name']);
    }
}
