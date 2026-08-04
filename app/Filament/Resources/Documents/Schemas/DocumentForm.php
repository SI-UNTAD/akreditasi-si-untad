<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Illuminate\Support\Arr;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('criteria_id')
                    ->relationship('criteria', 'name')
                    ->required(),
                Select::make('ppepp_category')
                ->options(fn () => Arr::except(Document::PPEPP_CATEGORIES, 'summary'))
                ->required(),
                TextInput::make('document_number')
                    ->maxLength(255),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('document_type'),
                Select::make('year')
                    ->options(fn() => collect(range(now()->year + 5, 2020))
                        ->mapWithKeys(fn($y) => [$y => $y]))
                    ->searchable(),
                TextInput::make('google_drive_file_id')
                    ->maxLength(255)
                    ->label('Google Drive File ID')
                    ->helperText('Salin hanya ID dari URL Drive, misalnya "1AbC...Xyz". Contoh URL: https://drive.google.com/file/d/1AbC...Xyz/view'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->default(true),
                Toggle::make('is_restricted')
                    ->default(false),
            ]);
    }
}
