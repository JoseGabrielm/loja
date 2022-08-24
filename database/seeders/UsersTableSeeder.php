<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'marcio',
                'email' => 'marcio@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$RPr4zwPo/o1g4v/W5s5dOO.YMTHZxKEVx6cnYtrgzLumpxnhBmIAa',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'nGQbNoOb01S2leqngLTvity9Ny7DPIGUwEde1efx3Qbn25L8zCe8HzuFig2E',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 22:32:32',
                'updated_at' => '2021-04-05 22:32:32',
            ),
        ));
        
        
    }
}