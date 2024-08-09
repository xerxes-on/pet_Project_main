<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required()
                    ->maxDate(now()),
                Forms\Components\DatePicker::make('date_died')
                    ->maxDate(now()),
                Forms\Components\TextInput::make('about_author')
                    ->required()
                    ->minLength(30),
                Forms\Components\FileUpload::make('author_picture')
                    ->required()
                    ->image()
                    ->imageEditor()
                    ->maxSize(5120)
                    ->preserveFilenames()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('author_picture')
                    ->circular()
                    ->ring(5)
                    ->checkFileExistence(false),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('date_of_birth'),
                Tables\Columns\TextColumn::make('books_count')
                    ->label('Number of Books')
                    ->getStateUsing(function ($record) {
                        return $record->books()->count();
                    })


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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
