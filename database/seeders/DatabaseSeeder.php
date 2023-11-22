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
        // for production (uncomment everything below if everything is ready for production)
        $this->call(UserTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProgramsSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(SemestersSeeder::class);
        $this->call(QuarterSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(MunicipalitiesSeeder::class);
        // $this->call(OutcomeIndicatorTypeSeeder::class);
        // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
        //for testing purposes only (uncomment everything below if you want to test the sample data)
        // $this->call(BenefeciarySampleDataSeeder::class);
        // $this->call(BatchlistSeederSample::class);
    }
}
