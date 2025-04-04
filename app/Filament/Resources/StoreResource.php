<?php

declare(strict_types = 1);

namespace App\Filament\Resources;

use App\Filament\Resources\StoreResource\Pages;
use App\Models\Store;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup as TableBulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction as TableDeleteBulkAction;
use Filament\Tables\Actions\EditAction as TableEditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    #[\Override]
    public static function form(Form $form): Form
    {
        return $form->columns(1)
            ->schema([
                TextInput::make('name'),
                TextInput::make('phone'),
                RichEditor::make('about'),
                TextInput::make('logo'),
                TextInput::make('slug'),

            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Loja'),
                TextColumn::make('created_at')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('name', 'asc')
            ->filters([
                //
            ])
            ->actions([
                TableEditAction::make(),
            ])
            ->bulkActions([
                TableBulkActionGroup::make([
                    TableDeleteBulkAction::make(),
                ]),
            ]);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStores::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'edit'   => Pages\EditStore::route('/{record}/edit'),
        ];
    }
}
