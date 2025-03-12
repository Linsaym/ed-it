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
            ->where(function ($query) use ($left, $right) {
                $query->whereBetween('start', [$left, $right])
                    ->orWhereBetween('end', [$left, $right])
                    ->orWhere(function ($query) use ($left, $right) {
                        $query->where('start', '<=', $left)
                            ->where('end', '>=', $right);
                    })
                    ->orWhere(function ($query) use ($left, $right) {
                        $query->where('start', '<=', $left)
                            ->whereNull('end');
                    })
                    ->orWhere(function ($query) use ($left, $right) {
                        $query->where('start', '>=', $left)
                            ->whereNull('end');
                    });
            })
            ->get();

        $this->table(['ID', 'Start', 'End'], $intervals);
    }
}
