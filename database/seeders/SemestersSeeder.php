<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['semester' => '1'],
            ['semester' => '2'],
        ];

        /**
         * All about the upsert function
         * 1. First param is for the values to be inserted
         *
         * 2. Second param is for checking if there is already an existing
         * data in the column. If its true that there is an existing record then
         * the upsert function assumes that this is an update method. If the second
         * param can't find the duplicate value or the existing value then the
         * upsert function will assume that it is an insert/add new record.
         *
         * 3. Third param is for the columns that you want to update if the second param
         * verifies that there is an existing record or data's that will be newly inserted
         * if the second param verifies that there is no current existing records.
         *
         * DB::table('table')->upsert($values, $uniqueBy, $updateColumns);
         */

        DB::table('semesters')->upsert($data, ['semester'], ['semester']);
    }
}
