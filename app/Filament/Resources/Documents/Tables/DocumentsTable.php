<?php

namespace App\Filament\Resources\Documents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use App\Models\Document;
use Illuminate\Support\Arr;

class DocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('document_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('ppepp_category')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'penetapan' => 'primary',
                        'pelaksanaan' => 'success',
                        'evaluasi' => 'warning',
                        'pengendalian' => 'danger',
                        'peningkatan' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('criteria.full_label')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('year')
                    ->sortable(),
                TextColumn::make('file_size_human')
                    ->label('Ukuran'),
                IconColumn::make('is_published')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('ppepp_category')
                    ->options(fn() => Arr::except(Document::PPEPP_CATEGORIES, 'summary')),
                SelectFilter::make('criteria_id')
                    ->relationship('criteria', 'name')
                    ->label('Kriteria'),
                TernaryFilter::make('is_published'),
                TrashedFilter::make(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
