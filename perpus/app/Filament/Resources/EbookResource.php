<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use App\Models\Book;
use Filament\Tables;
use Filament\Forms\Form;
use Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EbookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EbookResource\RelationManagers;

class EbookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\FileUpload::make('cover')
                        ->image()
                        ->imageEditor(),
                    Forms\Components\TextInput::make('judul')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('penulis')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('penerbit')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('isbn')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tahun_terbit')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('kota_terbit')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('jumlah_halaman')
                        ->numeric()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\FileUpload::make('lampiran'),
                    Forms\Components\TextInput::make('link')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('is_publish')
                        ->label('Publikasi'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')->state(
                    static function (HasTable $livewire, stdClass $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\ImageColumn::make('cover'),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_view')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_publish')->label('Publish')->visible(fn () => Auth::user()->hasRole('admin')),
                Tables\Columns\ToggleColumn::make('is_popular')->label('Populer')->visible(fn () => Auth::user()->hasRole('admin')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEbooks::route('/'),
            'create' => Pages\CreateEbook::route('/create'),
            'edit' => Pages\EditEbook::route('/{record}/edit'),
        ];
    }
}
