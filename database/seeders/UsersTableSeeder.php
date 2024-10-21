<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'sbadmin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$io9oCEqy70lvZ/WYopvcbuA1UU8QXLVPDzTN8KKGaNgo5kmX/QXTy',
                'remember_token' => 'ClDjf1wYWDTAI3Ho08l0Rixvc1R36GHMYGmxY77M2jNheKHK7M0wUJU4A9cs',
                'created_at' => '2023-07-18 19:58:25',
                'updated_at' => '2023-07-18 19:58:25',
            ),
        ));
        
        
    }
}