<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\DistrictsEnum;
use App\Enums\ProvinceEnum;
use DB;
class MunicipalitiesSeeder extends Seeder
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
            // DAVAO DE ORO MUNICIPALITIES
            // first district of Davao De Oro
            ['municipality' => 'Compostela', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_ONE ],
            ['municipality' => 'Maragusan', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Monkayo', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Montevista', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'New Bataan', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_ONE],

            // second district of Davao De Oro
            ['municipality' => 'Laak', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Mabini', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Maco', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Mawab', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Pantukan', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Nabunturan', 'province_id'=> ProvinceEnum::DAVAO_DE_ORO, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

            // DAVAO DEL NORTE
            // fist district of Davao Del Norte
            ['municipality' => 'Tagum City', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Asuncion', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Kapalong', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'New Corella', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'San Isidro', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Talaingod', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_ONE],

            // second district of Davao Del Norte
            ['municipality' => 'Braulio Dujali', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Carmen', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'City of Panabo', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Island Garden City of Samal', 'province_id'=>'4', 'district' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Sto, Tomas', 'province_id'=> ProvinceEnum::DAVAO_DEL_NORTE, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

            // DAVAO ORIENTAL
            // First district of Davao Oriental
            ['municipality' => 'Baganga', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Boston', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Caraga', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Cateel', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Manay', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_ONE],
            ['municipality' => 'Tarragona', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_ONE],

            // second district of Davao Oriental
            ['municipality' => 'Banaybanay', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'City of Mati', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Governor Generoso', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'Lupon', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            ['municipality' => 'San Isidro', 'province_id'=> ProvinceEnum::DAVAO_ORIENTAL, 'district_id' => DistrictsEnum::DISTRICT_TWO],
            // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

            // DAVAO DEL SUR
            ['municipality' => 'Bansalan', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'City of Digos', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Hagonoy', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Kiblawan', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Magsaysay', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Malalag', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Matanao', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Padada', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Sta. Cruz', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Sulop', 'province_id'=> ProvinceEnum::DAVAO_DEL_SUR, 'district_id' => DistrictsEnum::NO_DISTRICT],
            // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

            // DAVAO OCCIDENTAL
            ['municipality' => 'Don Marcelino', 'province_id'=> ProvinceEnum::DAVAO_OCCIDENTAL, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Jose Abad Santos', 'province_id'=> ProvinceEnum::DAVAO_OCCIDENTAL, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Malita', 'province_id'=> ProvinceEnum::DAVAO_OCCIDENTAL, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Sta. Maria', 'province_id'=> ProvinceEnum::DAVAO_OCCIDENTAL, 'district_id' => DistrictsEnum::NO_DISTRICT],
            ['municipality' => 'Saranggani', 'province_id'=> ProvinceEnum::DAVAO_OCCIDENTAL, 'district_id' => DistrictsEnum::NO_DISTRICT],

        ];

        DB::table('municipalities')->upsert($data, ['municipality', 'province_id', 'district_id'], ['municipality', 'province_id', 'district_id']);
    }
}
