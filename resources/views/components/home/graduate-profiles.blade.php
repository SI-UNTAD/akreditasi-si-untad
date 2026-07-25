{{-- resources/views/components/home/graduate-profiles.blade.php --}}

<section class="py-[120px] max-w-[1280px] mx-auto px-16">

    <div class="text-center mb-16">
        <h2 class="text-[32px] font-semibold tracking-[-0.01em] text-[#003d9b] mb-4">
            Capaian Profil Lulusan
        </h2>
        <p class="text-[#434654] max-w-2xl mx-auto">
            Mempersiapkan tenaga profesional dengan kompetensi global
            di bidang teknologi informasi.
        </p>
        <div class="elegant-line mx-auto max-w-[200px] mt-6"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ([
            ['icon' => 'database',        'title' => 'Data Engineer',   'desc' => 'Expert in designing and managing complex data architectures and pipelines.'],
            ['icon' => 'analytics',       'title' => 'System Analyst',  'desc' => 'Bridging business needs with technical solutions through rigorous system modeling.'],
            ['icon' => 'business_center', 'title' => 'IT Consultant',   'desc' => 'Providing strategic technology guidance to optimize organizational performance.'],
        ] as $profile)
            <div class="glass-card bg-white/70 backdrop-blur-xl p-8 rounded-[24px]
                        border border-[#c3c6d6]/30 flex flex-col items-center
                        text-center group hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 rounded-full bg-[#003d9b]/5 flex items-center
                            justify-center mb-6 group-hover:bg-[#fed65b]/20
                            transition-colors">
                    <span class="material-symbols-outlined text-[40px] text-[#0052cc]
                                 group-hover:text-[#735c00] transition-colors">
                        {{ $profile['icon'] }}
                    </span>
                </div>
                <h4 class="text-[24px] font-semibold text-[#003d9b] mb-3">
                    {{ $profile['title'] }}
                </h4>
                <p class="text-[16px] leading-[1.6] text-[#434654]">
                    {{ $profile['desc'] }}
                </p>
            </div>
        @endforeach
    </div>
</section>