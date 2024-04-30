<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsersResource\Pages;
use App\Filament\Resources\UsersResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class UsersResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label(__('Name'))
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label(__('Email'))
                ->email()
                ->required()
                ->unique(User::class, 'email'),

            TextInput::make('password')
                ->label(__('Password'))
                ->password()  // This will make the input type suitable for passwords
                ->required()
                ->minLength(8)  // Ensure a minimum length for security
                ->maxLength(255),

            Select::make('roles')
                ->label(__('Role'))
                ->options([
                    'admin' => __('admin'),
                    'employee' => __('employee'),
                    // Add more roles if necessary
                ])
                ->required()
                ->default('employee'),
        ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label(__('Name'))->searchable()->sortable(),
                TextColumn::make('email')->label(__('Email'))->searchable()->sortable(),
                TextColumn::make('roles')->label(__('Role'))->searchable()->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUsers::route('/create'),
            'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->isAdmin();
    }

    public static function canCreate(): bool
    {
        return Auth::user()->isAdmin();
    }

    public static function canEdit($record): bool
    {
        return Auth::user()->isAdmin();
    }

    public static function canDelete($record): bool
    {
        return Auth::user()->isAdmin();
    }
}
