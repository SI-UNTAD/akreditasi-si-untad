{{-- resources/views/components/home/graduate-profiles.blade.php --}}

@section('title', 'IS TADULAKO — Capaian Profil Lulusan')

@section('content')
    <section class="py-section-gap max-w-container-max mx-auto px-margin-page">
        <div class="text-center mb-16">
            <h2 class="text-heading-1 font-bold text-ink mb-4 tracking-tight-heading-1">
                Capaian Profil Lulusan
            </h2>
            <p class="text-body-lg text-ink-muted max-w-2xl mx-auto">
                Mempersiapkan tenaga profesional dengan kompetensi global di bidang teknologi informasi.
            </p>
            <div class="elegant-line mx-auto max-w-[200px] mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ([
                ['icon' => 'storage',        'title' => 'Data Engineer',   'desc' => 'Expert in designing and managing complex data architectures and pipelines.', 'color' => 'accent-sky'],
                ['icon' => 'query_stats',    'title' => 'System Analyst',  'desc' => 'Bridging business needs with technical solutions through rigorous system modeling.', 'color' => 'accent-purple'],
                ['icon' => 'support_agent',  'title' => 'IT Consultant',   'desc' => 'Providing strategic technology guidance to optimize organizational performance.', 'color' => 'accent-teal'],
            ] as $profile)
                <div class="feature-card flex flex-col items-center text-center group hover:scale-[1.02] transition-all duration-300">
                    <div class="w-16 h-16 rounded-full bg-{{ $profile['color'] }}/10 flex items-center justify-center mb-6 group-hover:bg-{{ $profile['color'] }}/20 transition-colors">
                        <span class="material-symbols-outlined text-[40px] text-{{ $profile['color'] }} group-hover:text-{{ $profile['color'] }}-deep transition-colors">
                            {{ $profile['icon'] }}
                        </span>
                    </div>
                    <h4 class="text-heading-3 font-bold text-ink mb-3">
                        {{ $profile['title'] }}
                    </h4>
                    <p class="text-body-md text-ink-secondary">
                        {{ $profile['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
@endsection