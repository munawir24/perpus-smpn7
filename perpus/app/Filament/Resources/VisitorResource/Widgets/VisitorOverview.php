<?php

namespace App\Filament\Resources\VisitorResource\Widgets;

use Carbon\Carbon;
use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class VisitorOverview extends BaseWidget
{
    protected static ?int $sort = -3;

    protected static bool $isLazy = false;
    protected ?string $heading = 'Pengunjung Website';
    protected function getColumns(): int
    {
        return 2; // Mengatur agar hanya 2 item dalam satu baris
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Hari Ini', Visitor::whereDate('created_at', Carbon::today())->get()->count()),
            Stat::make('Total', Visitor::count()),
        ];
    }
}