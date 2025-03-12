<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntervalsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10000; $i++) {
            Interval::create([
                'start' => rand(0, 100),
                'end' => rand(0, 100) > 50 ? rand(0, 100) : null,
            ]);
        }
    }
}
