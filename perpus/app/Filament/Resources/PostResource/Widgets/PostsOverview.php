<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PostsOverview extends BaseWidget
{
    protected static ?int $sort = -4;

    protected static bool $isLazy = false;

    protected ?string $heading = 'Blog';

    protected function getStats(): array
    {
        return [
            Stat::make('All Post', Post::all()->count()),
            Stat::make('Post', Post::where('status', true)->get()->count()),
            Stat::make('Draft', Post::where('status', false)->get()->count()),

        ];
    }
}