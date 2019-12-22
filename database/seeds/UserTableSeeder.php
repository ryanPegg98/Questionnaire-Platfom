<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Adding a known user
        DB::table('users')->insert([
           [
               'id' => 1,
               'name' => 'Ryan',
               'email' => 'ryan@example.com',
               'password' => bcrypt('password'),
               'remember_token' => str_random(10),
           ],
        ]);
    }
}
