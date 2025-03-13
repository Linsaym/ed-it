<?php

namespace Database\Seeders;

use App\Models\Interval;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntervalsTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 10000; $i++) {
            $start = rand(0, 100);
            $data[] = [
                'start' => $start,
                'end' => rand(0, 100) > 50 ? $start + rand(0, 100) : null, //чутка рандома для лучей
            ];
        }

        // Разделяем массив на части (по 1000 записей) для более эффективной вставки
        foreach (array_chunk($data, 1000) as $chunk) {
            DB::table('intervals')->insert($chunk);
        }
    }
}
