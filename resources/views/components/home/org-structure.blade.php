{{-- resources/views/components/home/org-structure.blade.php --}}

@props(['structure' => [], 'id' => 'struktur'])

<section id="{{ $id }}" class="py-section-gap max-w-container-max mx-auto px-margin-page">

    <div class="text-center mb-20">
        <h2 class="text-heading-1 font-bold text-ink mb-4 tracking-tight-heading-1">
            Struktur Organisasi
        </h2>
        <p class="text-body-lg text-ink-muted">
            Kepemimpinan yang berfokus pada kolaborasi dan transparansi.
        </p>
    </div>

    <div class="relative flex flex-col items-center">

        {{-- Kepala Prodi --}}
        <div class="feature-card border-2 border-primary p-8 rounded-2xl w-80 text-center z-10 relative">
            <div class="w-16 h-16 rounded-full bg-primary/10 mx-auto mb-4 flex items-center justify-center">
                <span class="material-symbols-outlined text-primary text-3xl">
                    {{ $structure['head']['icon'] }}
                </span>
            </div>
            <h4 class="text-heading-2 font-bold text-ink">
                {{ $structure['head']['name'] }}
            </h4>
            <p class="text-body-sm text-ink-muted">
                {{ $structure['head']['title'] }}
            </p>
        </div>

        {{-- Vertical connector --}}
        <div class="h-16 w-[1px] bg-hairline"></div>

        {{-- Horizontal connector --}}
        <div class="relative w-full max-w-5xl h-[1px] bg-hairline">
            @for ($i = 0; $i < 9; $i++)
                <div class="absolute top-0 left-[calc(100%/9*{{$i}} + 50%)] h-8 w-[1px] bg-hairline -translate-x-1/2"></div>
            @endfor
        </div>

        {{-- 9 Dosen Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8 w-full max-w-5xl">
            @foreach ($structure['lecturers'] as $lecturer)
                <div class="feature-card flex flex-col items-center text-center">
                    <div class="w-8 h-8 rounded-full bg-accent-sky/10 flex items-center justify-center mb-4 mx-auto">
                        <span class="material-symbols-outlined text-[24px] text-accent-sky">
                            school
                        </span>
                    </div>
                    <h5 class="text-heading-3 font-bold text-ink">
                        {{ $lecturer['name'] }}
                    </h5>
                    <p class="text-body-sm text-ink-muted">
                        {{ $lecturer['title'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>