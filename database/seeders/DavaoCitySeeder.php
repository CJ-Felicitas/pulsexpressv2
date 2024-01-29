<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use App\Enums\ProvinceEnum;
use App\Enums\DistrictsEnum;

class DavaoCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
            // DAVAO CITY 
            ['municipality' => '1st Congressional District', 'province_id' => ProvinceEnum::DAVAO_CITY, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => '2nd Congressional District', 'province_id' => ProvinceEnum::DAVAO_CITY, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => '3rd Congressional District', 'province_id' => ProvinceEnum::DAVAO_CITY, 'district_id' => DistrictsEnum::DISTRICT_THREE],
        ];

        DB::table('municipalities')->upsert($data, ['municipality', 'province_id', 'district_id'], ['municipality', 'province_id', 'district_id']);
    }
}
