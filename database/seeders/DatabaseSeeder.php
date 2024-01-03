<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProgramsSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(SemestersSeeder::class);
        $this->call(QuarterSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(MunicipalitiesSeeder::class);
        $this->call(TargetSeeder::class);
    }
}
