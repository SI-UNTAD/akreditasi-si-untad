<?php

// app/Models/Criteria.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criteria extends Model
{
    protected $table = 'criteria';

    protected $fillable = [
        'number', 'name', 'slug', 'icon', 'description', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'number' => 'integer',
    ];

    // Relasi ke semua dokumen
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class)->orderBy('sort_order');
    }

    // Relasi ke dokumen per kategori PPEPP
    public function documentsByCategory(string $category): HasMany
    {
        return $this->hasMany(Document::class)
            ->where('ppepp_category', $category)
            ->where('is_published', true)
            ->orderBy('sort_order');
    }

    // Accessor: URL-friendly label untuk heading
    public function getFullLabelAttribute(): string
    {
        return "Kriteria {$this->number}: {$this->name}";
    }

    // Route binding by slug
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Scope: hanya kriteria aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('number');
    }
}
