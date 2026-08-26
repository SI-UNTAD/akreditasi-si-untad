<?php

namespace Tests\Feature;

use App\Filament\Resources\Documents\Pages\CreateDocument;
use App\Models\Criteria;
use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DocumentPlaceholderTest extends TestCase
{
    use RefreshDatabase;

    private function createCriteria(): Criteria
    {
        return Criteria::create([
            'number' => 1,
            'name' => 'Kriteria Uji',
            'slug' => 'kriteria-uji',
            'icon' => 'flag',
            'is_active' => true,
        ]);
    }

    public function test_null_and_placeholder_ids_have_no_drive_access(): void
    {
        $criteria = $this->createCriteria();

        foreach ([null, Document::PLACEHOLDER_FILE_ID] as $id) {
            $doc = Document::create([
                'criteria_id' => $criteria->id,
                'ppepp_category' => 'penetapan',
                'title' => 'Dok Tanpa File ' . ($id === null ? 'Null' : 'Placeholder'),
                'google_drive_file_id' => $id,
                'is_published' => true,
            ]);

            $this->assertFalse($doc->hasDriveFile());
            $this->assertNull($doc->preview_url);
            $this->assertNull($doc->download_url);
        }
    }

    public function test_form_rejects_literal_placeholder_value(): void
    {
        $this->actingAs(User::factory()->create());
        $criteria = $this->createCriteria();

        Livewire::test(CreateDocument::class)
            ->fillForm([
                'criteria_id' => $criteria->id,
                'ppepp_category' => 'penetapan',
                'title' => 'Dok Uji Form',
                'google_drive_file_id' => Document::PLACEHOLDER_FILE_ID,
            ])
            ->call('create')
            ->assertHasFormErrors(['google_drive_file_id']);
    }
}