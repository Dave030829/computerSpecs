<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonalComputersResource\Pages;
use App\Filament\Resources\PersonalComputersResource\RelationManagers;
use App\Models\PersonalComputers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;


class PersonalComputersResource extends Resource
{
    protected static ?string $model = PersonalComputers::class;

    protected static ?string $navigationIcon = 'icon-pc';

    public static function getNavigationGroup(): string
    {
        return __('Computers');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')->label(__('Name'))->required(),
            Forms\COmponents\TextInput::make('price')->label(__('Price'))->required(),
            Forms\Components\TextInput::make('processor')->label(__('Processor'))->required(),
            Forms\Components\TextInput::make('gpu')->label(__('GPU'))->required(),
            Forms\Components\TextInput::make('ram')->label(__('RAM'))->required(),
            Forms\Components\TextInput::make('storage_type')->label(__('Storage Type'))->required(),
            Forms\Components\TextInput::make('storage_size')->label(__('Storage Size'))->type('number')->required(),
            Forms\Components\TextInput::make('boot_time')->label(__('Boot Time'))->required(),
            Forms\Components\TextInput::make('os')->label(__('Operating System'))->required(),
            Forms\Components\TextInput::make('cinebench_score')->label(__('Cinebench Score'))->type('number')->required(),
            Forms\Components\TextInput::make('power_consumption')->label(__('Power Consumption'))->type('number')->required(),
        ]);
    }


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')->label(__('Name'))->searchable()->sortable(),
            TextColumn::make('price')->label(__('Price'))->searchable()->sortable(),
            TextColumn::make('processor')->label(__('Processzor'))->searchable()->sortable(),
            TextColumn::make('gpu')->label(__('GPU'))->searchable()->sortable(),
            //TextColumn::make('ram')->label(__('RAM'))->searchable()->sortable(),
            //TextColumn::make('storage_type')->label(__('Storage Type'))->searchable()->sortable(),
            TextColumn::make('storage_size')->label(__('Storage Size'))->searchable()->sortable(),
            //TextColumn::make('boot_time')->label(__('Boot Time'))->searchable()->sortable(),
            //TextColumn::make('os')->label(__('Operating System'))->searchable()->sortable(),
            //TextColumn::make('cinebench_score')->label(__('Cinebench Score'))->searchable()->sortable(),
            //TextColumn::make('power_consumption')->label(__('Power Consumption'))->searchable()->sortable()
            TextColumn::make('in_stock')->label(__('In Stock'))->searchable()->sortable(),
            Tables\Columns\IconColumn::make('available')->label(__('Available'))
            ->boolean()
            ->action(function($record, $column) {
                $name = $column->getName();
                $record->update([
                    $name => !$record->$name
            ]);
            }),
            ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            //
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
            'index' => Pages\ListPersonalComputers::route('/'),
            'create' => Pages\CreatePersonalComputers::route('/create'),
            'edit' => Pages\EditPersonalComputers::route('/{record}/edit'),
        ];
    }
}
