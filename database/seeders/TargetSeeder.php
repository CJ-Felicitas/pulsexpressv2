<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\ProgramsEnum;
use App\Enums\QuartersEnum;
use DB;
class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataToInsert = [
            // fourps
            [
                'program_id' => ProgramsEnum::FOURPS,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::FOURPS,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::FOURPS,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::FOURPS,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // slp
            [
                'program_id' => ProgramsEnum::SLP,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::SLP,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::SLP,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::SLP,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // kalahi
            [
                'program_id' => ProgramsEnum::KALAHI,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' =>ProgramsEnum::KALAHI,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::KALAHI,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::KALAHI,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // Social Pension
            [
                'program_id' => ProgramsEnum::SOCIAL_PENSION_PROGRAM,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::SOCIAL_PENSION_PROGRAM,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::SOCIAL_PENSION_PROGRAM,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::SOCIAL_PENSION_PROGRAM,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // SFP
            [
                'program_id' => ProgramsEnum::FEEDING_PROGRAM,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::FEEDING_PROGRAM,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::FEEDING_PROGRAM,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::FEEDING_PROGRAM,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // drrm
            [
                'program_id' => ProgramsEnum::DRRM,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::DRRM,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::DRRM,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::DRRM,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // centenarrian
            [
                'program_id' => ProgramsEnum::CENTENARRIAN,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::CENTENARRIAN,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::CENTENARRIAN,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::CENTENARRIAN,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // AICS
            [
                'program_id' => ProgramsEnum::AICS,
                'quarter_id' => QuartersEnum::FIRST_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::AICS,
                'quarter_id' => QuartersEnum::SECOND_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::AICS,
                'quarter_id' => QuartersEnum::THIRD_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            [
                'program_id' => ProgramsEnum::AICS,
                'quarter_id' => QuartersEnum::FOURTH_QUARTER,
                'physical_target' => 0,
                'budget_target' => 0,
                // Add more columns and values as needed for the first row
            ],
            // Add more associative arrays for additional rows
        ];

        // Insert multiple rows into the database table
        DB::table('program_targets')->insert($dataToInsert);
    }
}
