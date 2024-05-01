<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonalComputersResource\Pages;
use App\Models\PersonalComputers;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Response;


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
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),

                TextInput::make('price')
                    ->label(__('Price'))
                    ->numeric()
                    ->required(),

                TextInput::make('processor')
                    ->label(__('Processor'))
                    ->required(),

                TextInput::make('gpu')
                    ->label(__('GPU'))
                    ->required(),

                Select::make('ram')
                    ->label(__('RAM'))
                    ->options([
                        '8' => '8 GB',
                        '16' => '16 GB',
                        '32' => '32 GB',
                        '64' => '64 GB',
                        '128' => '128 GB',
                    ])
                    ->required(),

                Select::make('storage_type')
                    ->label(__('Storage Type'))
                    ->options([
                        'SSD' => 'SSD',
                        'HDD' => 'HDD',
                        'else' => 'Else',
                    ])
                    ->required(),

                Select::make('storage_size')
                    ->label(__('Storage Size'))
                    ->options([
                        '128' => '128 GB',
                        '256' => '256 GB',
                        '512' => '512 GB',
                        '1024' => '1 TB',
                        '2048' => '2 TB',
                    ])
                    ->required(),

                TextInput::make('boot_time')
                    ->label(__('Boot Time'))
                    ->required(),

                TextInput::make('cinebench_score')
                    ->label(__('Cinebench Score'))
                    ->required(),

                TextInput::make('in_stock')
                    ->label(__('In Stock'))
                    ->numeric()
                    ->required(),

                Select::make('os')
                    ->label(__('OS'))
                    ->options([
                        'Windows'=> 'Windows',
                        'Linux'=>'Linux',
                        'macOS'=>'macOS'
                    ])
                    ->required(),

                TextInput::make('power_consumption')
                    ->label(__('Power Consumption'))
                    ->numeric()
                    ->required(),

                Toggle::make('available')
                    ->label(__('Available'))
                    ->required(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label(__('Name'))
                ->searchable()
                ->sortable()
                ->toggleable(true),

                TextColumn::make('price')
                ->label(__('Price'))
                ->searchable()
                ->sortable()
                ->toggleable(true)
                ->html()
                ->formatStateUsing(function ($state) {
                    return "<span>" . number_format($state, 0, '.', ',') . " HUF</span>";
                }),            

            TextColumn::make('in_stock')
                ->label(__('In Stock'))
                ->searchable()
                ->sortable()
                ->toggleable(true)
                ->color(function ($record) {
                    return $record->in_stock < 5 ? 'red' : 'green';
                }),

            Tables\Columns\IconColumn::make('available')
                ->label(__('Available'))
                ->boolean()
                ->toggleable(true),

            TextColumn::make('processor')
                ->label(__('Processor'))
                ->searchable()
                ->sortable()
                ->toggleable(true),

            TextColumn::make('gpu')
                ->label(__('GPU'))
                ->searchable()
                ->sortable()
                ->toggleable(true),

            TextColumn::make('ram')
                ->label(__('RAM'))
                ->searchable()
                ->sortable()
                ->toggleable(true)
                ->html()
                ->formatStateUsing(function ($state) {
                    return "<span>{$state} GB</span>";
                }),

            TextColumn::make('storage_type')
                ->label(__('Storage Type'))
                ->searchable()
                ->sortable()
                ->toggleable(true),

            TextColumn::make('storage_size')
                ->label(__('Storage Size'))
                ->searchable()
                ->sortable()
                ->toggleable(true)
                ->html()
                ->formatStateUsing(function ($state) {
                    return "<span>{$state} GB</span>";
                }),

            TextColumn::make('boot_time')
                ->label(__('Boot Time'))
                ->searchable()
                ->sortable()
                ->toggleable(true)
                ->html()
                ->formatStateUsing(function ($state) {
                    return "<span>{$state} sec</span>";
                }),

            TextColumn::make('os')
                ->label(__('Operating System'))
                ->searchable()
                ->sortable()
                ->toggleable(true),

                TextColumn::make('cinebench_score')
                ->label(__('Cinebench Score'))
                ->searchable()
                ->sortable()
                ->toggleable(true)
                ->tooltip("It shows the laptop's performance")
                ->html()
                ->formatStateUsing(function ($state, $record) {
                    if ($record->cinebench_score > 750) {
                        return "<span style='color: skyblue;'>{$state}</span>";
                    }
                    return $state;
                }),
            
            

            TextColumn::make('power_consumption')
                ->label(__('Power Consumption'))
                ->searchable()
                ->sortable()
                ->toggleable(true)
                ->html()
                ->formatStateUsing(function ($state) {
                    return "<span>{$state} W</span>";
                }),
        ])
                ->filters([
                    SelectFilter::make('storage_type')
                        ->options([
                            'SSD' => 'SSD',
                            'HDD' => 'HDD',
                            'else' => 'Else',
                        ]),
                    SelectFilter::make('os')
                        ->options([
                            'windows' => 'Windows',
                            'linux' => 'Linux',
                            'macOS' => 'macOS',
                        ]),
                    SelectFilter::make('available')
                        ->label(__('Available'))
                        ->options([
                            '1' => __('Yes'),
                            '0' => __('No'),
                        ])
                        ->query(function (Builder $query, array $data) {
                            if (isset($data['value']) && $data['value'] !== '') {
                                $query->where('available', $data['value']);
                            }
                        })
                ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                BulkAction::make('export')
                ->label('Export CSV')
                ->action(function ($records) {
                    $filename = 'laptops_export_' . date('Y-m-d_H-i-s') . '.csv';
                    $csvHeader = ['Name', 'Price', 'Processor', 'GPU', 'RAM', 'Storage Type', 'Storage Size', 'OS', 'Power Consumption', 'Available'];
                    
                    return Response::streamDownload(function () use ($records, $csvHeader) {
                        $handle = fopen('php://output', 'w');
                        fputcsv($handle, $csvHeader);
                        
                        foreach ($records as $record) {
                            fputcsv($handle, [
                                $record->name,
                                $record->price,
                                $record->processor,
                                $record->gpu,
                                $record->ram,
                                $record->storage_type,
                                $record->storage_size,
                                $record->os,
                                $record->power_consumption,
                                $record->available ? 'Yes' : 'No',
                            ]);
                        }
                        fclose($handle);
                    }, $filename);
                })
                ->icon('icon-download'),

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
