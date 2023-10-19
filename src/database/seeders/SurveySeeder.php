<?php

namespace Sonphait\SurveyAdmin\database\seeders;

use Database\Seeders\DB;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('survey')->insert([
            'name' => 'survey 1',
            'slug' => 'survey_1',
            'json' => '{"pages":[{"name":"page1","elements":[{"type":"comment","name":"question1","title":"abc","placeHolder":"how can i"},{"type":"matrix","name":"question2","columns":["Column 1","Column 2","Column 3"],"rows":["Row 1","Row 2"]}]}]}',
        ]);
    }
}
