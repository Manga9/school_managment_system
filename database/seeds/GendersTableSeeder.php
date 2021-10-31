<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['en' => 'male', 'ar' => 'ذكر'],
            ['en' => 'female', 'ar' => 'انثى']
        ];
        foreach ($genders as $gender) {
            \App\Models\Gender::create(['name' => $gender]);
        }
    }
}
