<?php

use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specs = [
            ['en' => 'arabic', 'ar' => 'عربى'],
            ['en' => 'math', 'ar' => 'رياضة'],
            ['en' => 'science', 'ar' => 'علوم'],
            ['en' => 'english', 'ar' => 'انجليزى'],
            ['en' => 'computer science', 'ar' => 'علوم الكمبيوتر'],
        ];
        foreach ($specs as $spec) {
            \App\Models\Specialization::create(['name' => $spec]);
        }
    }
}
