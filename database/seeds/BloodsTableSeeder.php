<?php

use Illuminate\Database\Seeder;

class BloodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloods = ['O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+'];

        foreach ($bloods as $blood) {
            \App\Models\Blood::create(['name' => $blood]);
        }
    }
}
