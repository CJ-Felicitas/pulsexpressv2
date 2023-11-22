<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Davao Oriental'],
            ['name' => 'Davao De Oro'],
            ['name' => 'Davao Occidental'],
            ['name' => 'Davao Del Norte'],
            ['name' => 'Davao Del Sur'],
            ['name' => 'Davao City'],
        ];

        DB::table('provinces')->upsert($data, ['name'], ['name']);
    }
}
