<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * we could have seperated this into 2 seperate seeder files,
         * but since this is too simple, lets keep in a single file.
         */

        //seed users table with random data 10x
        for($i=0; $i<10; $i++) {
            DB::table('users')->insert([
                'username' => 'Test User '. $i,
                'email' => 'test_user_'. $i .'@gmail.com',
                'password' => Hash::make('password'),
                'role' => rand(0,2),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        //seed tasks table with random data 20x
        for($i=0; $i<20; $i++) {
            DB::table('tasks')->insert([
                'name' => 'This is test task '. $i,
                'description' => 'This is test description '. $i,
                'status' => rand(0,3),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        
    }
}
