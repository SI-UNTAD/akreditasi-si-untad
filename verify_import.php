<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Document;
use App\Models\Criteria;

echo "=== TOTAL DOKUMEN ===" . PHP_EOL;
echo "Total: " . Document::count() . PHP_EOL . PHP_EOL;

echo "=== PER KRITERIA ===" . PHP_EOL;
foreach(Criteria::orderBy('number')->get() as $c) {
    $count = Document::where('criteria_id', $c->id)->count();
    echo "Kriteria {$c->number} ({$c->name}): {$count} dokumen" . PHP_EOL;
}
echo PHP_EOL;

echo "=== PER KATEGORI PPEPP ===" . PHP_EOL;
$cats = ['penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan'];
foreach($cats as $cat) {
    $count = Document::where('ppepp_category', $cat)->count();
    echo ucfirst($cat) . ": {$count}" . PHP_EOL;
}
echo PHP_EOL;

echo "=== DENGAN FILE ID vs TANPA ===" . PHP_EOL;
echo "Dengan Google Drive File ID: " . Document::whereNotNull('google_drive_file_id')->count() . PHP_EOL;
echo "Tanpa File ID (placeholder): " . Document::whereNull('google_drive_file_id')->count() . PHP_EOL;
echo PHP_EOL;

echo "=== SAMPLE DATA ===" . PHP_EOL;
$sample = Document::with('criteria')->first();
if ($sample) {
    echo "ID: {$sample->id}" . PHP_EOL;
    echo "Title: {$sample->title}" . PHP_EOL;
    echo "Criteria: {$sample->criteria->number} - {$sample->criteria->name}" . PHP_EOL;
    echo "PPEPP: {$sample->ppepp_category}" . PHP_EOL;
    echo "File ID: {$sample->google_drive_file_id}" . PHP_EOL;
    echo "Year: " . ($sample->year ?? 'null') . PHP_EOL;
    echo "Sort Order: {$sample->sort_order}" . PHP_EOL;
    echo "Description: " . substr($sample->description ?? '', 0, 100) . PHP_EOL;
}