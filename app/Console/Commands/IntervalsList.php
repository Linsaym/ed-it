<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IntervalsList extends Command
{
    protected $signature = 'intervals:list {--left= : Левая граница интервала} {--right= : Правая граница интервала}';

    protected $description = 'Выводит интервалы, пересекающиеся с заданным интервалом [N, M]';

    public function handle(): void
    {
        $left = $this->option('left');
        $right = $this->option('right');


        if ($left === null || $right === null) {
            $this->error('Необходимо указать обе границы интервала: --left и --right');
            return;
        }

        $intervals = DB::table('intervals')
            ->where('start', '<=', $right)
            ->where(function ($query) use ($left) {
                $query->where('end', '>=', $left)
                    ->orWhereNull('end');
            })
            ->get(['id','start','end'])->map(function ($interval) {
                return [
                    'id' => $interval->id,
                    'start' => $interval->start,
                    'end' => $interval->end,
                ];
            });

        $count = $intervals->count();
        $this->info("Количество пересечений: $count");
        $this->table(['id', 'start', 'end'], $intervals);
    }
}
