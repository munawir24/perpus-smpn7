<?php

namespace App\Filament\Resources\VisitorResource\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class VisitorChart extends ChartWidget
{
    protected static ?int $sort = -2;
    protected static bool $isLazy = false;
    protected static ?string $pollingInterval = '10s';
    protected static string $color = 'info';
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '250px';
    protected function getData(): array
    {
        $data = Trend::model(Visitor::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }
    protected function getType(): string
    {
        return 'line';
    }

}