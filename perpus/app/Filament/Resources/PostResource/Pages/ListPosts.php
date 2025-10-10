<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Components;
use App\Filament\Resources\PostResource;
use Filament\Support\Enums\IconPosition;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Widgets\PostsOverview;


class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    public function getTabs(): array
    {
        return [
            'All' => Components\Tab::make()->badge(Post::all()->count())->modifyQueryUsing(fn(Builder $query) => $query->tap(fn() => $this->dispatch('refresh'))),
            'Post' => Components\Tab::make()->badge(Post::query()->where('status', true)->count())->modifyQueryUsing(fn(Builder $query) => $query->where('status', true)->tap(fn() => $this->dispatch('refresh'))),
            'Draft' => Components\Tab::make()->badge(Post::query()->where('status', false)->count())->modifyQueryUsing(fn(Builder $query) => $query->where('status', false)->tap(fn() => $this->dispatch('refresh'))),
        ];
    }
    public function getDefaultActiveTab(): string | int | null
    {
        return 'All';
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         PostsOverview::class,
    //     ];
    // }
    // protected function getViewData(): array
    // {
    //     return [
    //         'activeTab' => $this->getActiveTab(),
    //     ];
    // }
    // protected function getActiveTab(): string
    // {
    //     // Ambil nilai `activeTab` dari query string, default ke 'All' jika tidak ada
    //     return request()->query('activeTab', 'All');
    // }

    // protected function getViewData(): array
    // {
    //     return [
    //         'activeTab' => $this->getActiveTab(),
    //     ];
    // }
    // protected function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('index');
    // }
}