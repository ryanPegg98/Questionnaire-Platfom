<?php

use Illuminate\Database\Seeder;

class QuestionnaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionnaires')->insert([
            [
                'title' => 'Test Questionnaire',
                'description'=> 'This is a test questionnaire',
                'agreement' => 'This is just a test questionnaire and no personal data will be recorded during this questionnaire.',
                'status' => 0,
                'layout' => 0,
                'creator' => 1,
                'slug' => 'test',
            ],
        ]);
    }
}
