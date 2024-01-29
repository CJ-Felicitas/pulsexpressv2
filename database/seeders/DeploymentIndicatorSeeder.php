<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class DeploymentIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'status' => 'valid',
                'signal' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'status' => 'invalid',
                'signal' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            
            ]
        ];

        DB::table('deployed')->insert($data);
    }
}
