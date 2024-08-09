<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('categories')
                    ->relationship('categories', 'category_name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->multiple()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('category_name')
                            ->required(),
                    ]),
                Forms\Components\DatePicker::make('published_date')
                    ->required()
                    ->maxDate(now()),
                Forms\Components\Select::make('author_id')
                    ->relationship('author', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('number_of_pages')
                    ->integer()
                    ->required(),
                Forms\Components\FileUpload::make('images')
                    ->required()
                    ->image()
                    ->multiple()
                    ->imageEditor()
                    ->maxSize(5120)
                    ->panelLayout('grid')
                    ->preserveFilenames()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images')
                    ->circular()
                    ->stacked()
                    ->wrap()
                    ->limitedRemainingText()
                    ->checkFileExistence(false),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name'),
                Tables\Columns\TextColumn::make('published_date')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            RelationManagers\CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
