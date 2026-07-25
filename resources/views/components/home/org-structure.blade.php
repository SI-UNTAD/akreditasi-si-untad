{{-- resources/views/components/home/org-structure.blade.php --}}

@props(['structure' => [], 'id' => 'struktur'])

<section id="{{ $id }}"
         class="py-[120px] max-w-[1280px] mx-auto px-16">

    <div class="text-center mb-20">
        <h2 class="text-[32px] font-semibold text-[#003d9b] mb-4">
            Struktur Organisasi
        </h2>
        <p class="text-[#434654]">
            Kepemimpinan yang berfokus pada kolaborasi dan transparansi.
        </p>
    </div>

    <div class="relative flex flex-col items-center">

        {{-- Kepala Prodi --}}
        <div class="glass-card p-6 rounded-2xl border-2 border-[#003d9b]
                    w-64 text-center z-10 relative">
            <div class="w-16 h-16 rounded-full bg-[#0052cc] mx-auto mb-4
                        flex items-center justify-center">
                <span class="material-symbols-outlined text-[#c4d2ff] text-3xl">
                    {{ $structure['head']['icon'] }}
                </span>
            </div>
            <h4 class="font-bold text-[#003d9b]">
                {{ $structure['head']['name'] }}
            </h4>
            <p class="text-[12px] text-[#434654]">
                {{ $structure['head']['title'] }}
            </p>
        </div>

        {{-- Vertical line --}}
        <div class="h-16 w-[1px] bg-[#003d9b]/30"></div>

        {{-- Horizontal connector --}}
        <div class="relative w-full max-w-4xl h-[1px] bg-[#003d9b]/30">
            <div class="absolute top-0 left-0 h-8 w-[1px] bg-[#003d9b]/30"></div>
            <div class="absolute top-0 right-0 h-8 w-[1px] bg-[#003d9b]/30"></div>
            <div class="absolute top-0 left-1/2 h-8 w-[1px] bg-[#003d9b]/30"></div>
        </div>

        {{-- Unit-unit --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8 w-full">
            @foreach ($structure['units'] as $unit)
                <div class="flex flex-col items-center">
                    <div class="glass-card p-4 rounded-xl
                                border border-[#c3c6d6]/30 w-56 text-center">
                        <h5 class="font-bold text-[#003d9b] text-[16px]">
                            {{ $unit['name'] }}
                        </h5>
                        <p class="text-[11px] text-[#434654]">
                            {{ $unit['desc'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>