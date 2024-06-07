<?php

namespace App\Filament\Resources\ExpeditionResource\Widgets;

use App\Models\expedition;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ExpeditionChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Des Colis envoyez';

    protected function getData(): array
    {
        $data = Trend::model(expedition::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
        )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [

                    'label' => 'Colis Envoyez',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
