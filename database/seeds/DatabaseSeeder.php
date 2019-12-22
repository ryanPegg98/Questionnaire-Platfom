<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Questionnaire;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key check for this connection
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::unguard();

        User::truncate();
        Questionnaire::truncate();

        Model::reguard();
        //re-enable the key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //$this->call(UserTableSeeder::class);
        //$this->call(QuestionnaireTableSeeder::class);

        factory(User::class, 50)->create();
        factory(Questionnaire::class, 5)->create();
    }
}
