<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TVsResource\Pages;
use App\Filament\Resources\TVsResource\RelationManagers;
use App\Models\TVs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Toggle;

class TVsResource extends Resource
{
    protected static ?string $model = TVs::class;

    protected static ?string $pluralModelLabel = 'TVs';

    protected static ?string $navigationIcon = 'icon-tv';

    public static function getNavigationGroup(): string
    {
        return __('Displays');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label(__('Name'))->required(),
                Forms\COmponents\TextInput::make('price')->label(__('Price'))->required(),
                Forms\Components\TextInput::make('Hz')->label(__('Hz'))->required(),
                Forms\Components\TextInput::make('brightness')->label(__('Brightness'))->required(),
                Forms\Components\TextInput::make('panel_type')->label(__('Panel Type'))->required(),
                Toggle::make('smart')->label(__('Smart'))->required(),
                Forms\Components\TextInput::make('power_consumption')->label(__('Power Consumption'))->type('number')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //TextColumn::make('id')->label(__('ID'))->searchable()->sortable(),
                TextColumn::make('name')->label(__('Name'))->searchable()->sortable(),
                TextColumn::make('price')->label(__('Price'))->searchable()->sortable(),
                TextColumn::make('Hz')->label(__('Hz'))->searchable()->sortable(),
                TextColumn::make('brightness')->label(__('Brightness'))->searchable()->sortable(),
                TextColumn::make('panel_type')->label(__('Panel Type'))->searchable()->sortable(),
                Tables\Columns\IconColumn::make('smart')->label(__('Smart'))
                ->boolean()
                ->action(function($record, $column) {
                    $name = $column->getName();
                    $record->update([
                        $name => !$record->$name
                ]);
                }),
                TextColumn::make('in_stock')->label(__('In Stock'))->searchable()->sortable(),
                Tables\Columns\IconColumn::make('available')->label(__('Available'))
                ->boolean()
                ->action(function($record, $column) {
                    $name = $column->getName();
                    $record->update([
                        $name => !$record->$name
                ]);
                }),
                //TextColumn::make('power_consumption')->label(__('Power Consumption'))->searchable()->sortable()
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
            'index' => Pages\ListTVs::route('/'),
            'create' => Pages\CreateTVs::route('/create'),
            'edit' => Pages\EditTVs::route('/{record}/edit'),
        ];
    }
}
