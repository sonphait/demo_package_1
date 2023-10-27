<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surveys')->insert([
            'name' => 'survey 1',
            'slug' => 'survey_1',
            'json' => '{"pages":[{"name":"page1","elements":[{"type":"comment","name":"question1","title":"question 1","placeHolder":"your answer here"},{"type":"matrix","name":"question2","columns":["Column 1","Column 2","Column 3"],"rows":["Row 1","Row 2"]}]}]}',
        ]);
    }
}
