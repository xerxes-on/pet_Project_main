<?php

namespace App\Filament\Resources\BookResource\Widgets;

use App\Models\Book;
use App\Models\Rating;
use Filament\Widgets\ChartWidget;

class RatingsOverview extends ChartWidget
{
    protected static ?string $heading = 'Ratings';
    public ?Book $record;

    protected function getData(): array
    {
        $bookId = $this->record->id;
        $count1To5 = Rating::where('book_id', $bookId)
            ->whereBetween('rating', [1, 5])
            ->count();
        $count5To7 = Rating::where('book_id', $bookId)
            ->whereBetween('rating', [5, 7])
            ->count();
        $count7To10 = Rating::where('book_id', $bookId)
            ->whereBetween('rating', [7, 10])
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Rating',
                    'data' => [$count1To5, $count5To7, $count7To10],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    'hoverOffset' => 4
                ]
            ],
            'labels' => [
                'Bad',
                'Good',
                'Awesome'
            ]
        ];
    }


    protected function getType(): string
    {
        return 'doughnut';
    }
}
