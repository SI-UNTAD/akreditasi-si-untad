<?php
// database/migrations/xxxx_create_criteria_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('criteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number')        // 1–6
                  ->unique()
                  ->comment('Nomor kriteria akreditasi (1-6)');
            $table->string('name')                       // "Visi, Misi, Tujuan dan Sasaran"
                  ->comment('Nama lengkap kriteria');
            $table->string('slug')                       // "visi-misi"
                  ->unique();
            $table->string('icon')                       // "flag" (Material Symbols name)
                  ->default('folder');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('criteria');
    }
};