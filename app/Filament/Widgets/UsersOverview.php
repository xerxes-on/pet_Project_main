<?php

namespace App\Filament\Widgets;

use App\Models\Rating;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class UsersOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '50s';
    protected static ?int $sort = 0;


    protected function getStats(): array
    {
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $data = [];
        for ($i = 5; $i >= 0; $i--) {
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();

            $count = Rating::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

            $data[] = $count;
        }
        return [
            Stat::make('Reviews ', Rating::count())
                ->description(Rating::where('created_at', '>=', $thirtyDaysAgo)->count().' increase')
                ->color('success')
                ->chart($data)
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Users', User::all()->count())
                ->description('+'.User::where('created_at', '>=', $thirtyDaysAgo)->count().'increase')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Average time on page', '3:12')
                ->description('3% increase')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
