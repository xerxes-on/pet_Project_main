<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Resources\Pages\ViewRecord;

class ViewBook extends ViewRecord
{
    protected static string $resource = BookResource::class;

    public function getHeaderWidgets(): array
    {
        return [
            BookResource\Widgets\RatingsOverview::class
        ];
    }
}
