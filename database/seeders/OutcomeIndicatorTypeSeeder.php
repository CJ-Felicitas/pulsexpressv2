<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class OutcomeIndicatorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type' => 'default'],
            ['type' => 'sub_indicator'],
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

        DB::table('outcome_indicator_type')->upsert($data, ['type'], ['type']);
    }
}
