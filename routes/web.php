<?php
// routes/web.php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentPreviewController;


// Landing page (HOME)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman dokumen akreditasi
Route::get('/dokumen', [DocumentController::class, 'index'])->name('documents.index');
// Preview & Download proxy
Route::get('/documents/{document}/preview', [DocumentPreviewController::class, 'preview'])
     ->name('documents.preview');
Route::get('/documents/{document}/download', [DocumentPreviewController::class, 'download'])
     ->name('documents.download');
