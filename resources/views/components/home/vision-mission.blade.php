{{-- resources/views/components/home/vision-mission.blade.php --}}

@props(['id' => 'visi-misi'])

<section id="{{ $id }}" class="py-section-gap bg-canvas-soft px-margin-page">
    <div class="max-w-container-max mx-auto">
        <h2 class="text-heading-1 font-bold text-ink mb-16 text-center tracking-tight-heading-1">
            Visi & Misi
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="feature-card">
                <h3 class="text-heading-3 font-bold text-ink mb-4">Visi</h3>
                <p class="text-body-md text-ink-secondary">
                    Menjadi pusat unggulan pendidikan Sistem Informasi berbasis kearifan lokal yang kompetitif di tingkat internasional pada tahun 2030.
                </p>
            </div>
            <div class="feature-card">
                <h3 class="text-heading-3 font-bold text-ink mb-4">Misi</h3>
                <ul class="text-body-md text-ink-secondary space-y-2 list-disc pl-5">
                    <li>Pendidikan berkualitas.</li>
                    <li>Riset inovatif Data Science & AI.</li>
                    <li>Pengabdian masyarakat.</li>
                </ul>
            </div>
        </div>
    </div>
</section>