<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

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
                    ->options([
                        'penetapan' => 'Penetapan',
                        'pelaksanaan' => 'Pelaksanaan',
                        'evaluasi' => 'Evaluasi',
                        'pengendalian' => 'Pengendalian',
                        'peningkatan' => 'Peningkatan',
                        'summary' => 'Summary',
                    ])
                    ->required(),
                TextInput::make('document_number'),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('document_type'),
                TextInput::make('year'),
                TextInput::make('google_drive_file_id'),
                TextInput::make('google_drive_mime_type'),
                TextInput::make('file_size_bytes')
                    ->numeric(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->required(),
                Toggle::make('is_restricted')
                    ->required(),
            ]);
    }
}
