<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Enums\UserTypeEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'name' => 'Admin',
            'username' => 'admin',
            'password'=> Hash::make('admin@123'),
            'user_type' => UserTypeEnum::ADMIN
        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        //
        $data = [
            'name' => 'Pantawid Pamilyang Pilipino Program',
            'username'=> 'fourps',
            'password'=> Hash::make('fourps@123'),
            'user_type' => UserTypeEnum::FOURPS
        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        //
        $data = [
            'name' => 'Sustainable Livelihood Program',
            'username'=> 'slp',
            'password'=> Hash::make('slp@123'),
            'user_type' => UserTypeEnum::SLP
        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        //
        $data = [
            'name' => 'Kapit Bisig Laban Sa Kahirapan',
            'username'=> 'kalahi',
            'password'=> Hash::make('kalahi@123'),
            'user_type' => UserTypeEnum::KALAHI
        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        //
        $data = [
            'name' => 'Social Pension Program',
            'username'=> 'spp',
            'password'=> Hash::make('spp@123'),
            'user_type' => UserTypeEnum::SOCIAL_PENSION_PROGRAM
        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        //
        $data = [
            'name' => 'Supplementary Feeding Program',
            'username'=> 'sfp',
            'password'=> Hash::make('sfp@123'),
            'user_type' => UserTypeEnum::FEEDING_PROGRAM
        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        //
        $data = [
            'name' => 'Disaster Risk Reduction And Management',
            'username'=> 'drrm',
            'password'=> Hash::make('drrm@123'),
            'user_type' => UserTypeEnum::DRRM
        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        //
        $data = [
            'name' => 'Assistance To Individuals In Crisis Situations',
            'username'=> 'aics',
            'password'=> Hash::make('aics@123'),
            'user_type' => UserTypeEnum::AICS

        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
        
        $data = [
            'name' => 'Centenarrian',
            'username'=> 'centenarrian',
            'password'=> Hash::make('centenarrian@123'),
            'user_type' => UserTypeEnum::AICS

        ];

        DB::table('users')->upsert($data, ['name', 'password'], ['name', 'password']);
    }
}
