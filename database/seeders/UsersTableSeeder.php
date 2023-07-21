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
                'created_at' => '2023-07-16 18:08:18',
                'email' => 'semihcanbaz@hotmail.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'Semih',
                'password' => '$2y$10$ax7yJqz4ZxnHnCxhh.hl1e1OznOZ.lRDgD235f6Vuo2y5hTOw5IZ6',
                'remember_token' => NULL,
                'updated_at' => '2023-07-16 18:08:18',
            ),
            1 => 
            array (
                'created_at' => '2023-07-21 10:39:31',
                'email' => 'ahmetcanbaz@hotmail.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'name' => 'Ahmet',
                'password' => '$2y$10$Q6MlOy/E8wq.RmKSOxrlCOj7NC.87cBYHFZKBDu4fFwAeSyXq4gUu',
                'remember_token' => NULL,
                'updated_at' => '2023-07-21 10:39:31',
            ),
        ));
        
        
    }
}