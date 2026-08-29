{{-- resources/views/components/home/achievements.blade.php --}}

@props(['achievements' => [], 'id' => 'achievement'])

<section id="{{ $id }}" class="py-section-gap bg-canvas-soft overflow-hidden">
    <div class="max-w-container-max mx-auto px-margin-page">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <h2 class="text-heading-1 font-bold text-primary mb-2 tracking-tight-heading-1">
                    Prestasi Mahasiswa
                </h2>
                <p class="text-body-lg text-ink-muted">
                    Dedikasi dan inovasi yang melampaui batas ekspektasi.
                </p>
            </div>
            <a href="#"
                class="flex items-center gap-2 text-primary font-medium hover:text-primary-active underline transition-colors">
                View All Achievements
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">
                    arrow_forward
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($achievements as $item)
                <div class="feature-card-elevated rounded-2xl p-0 overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
                    <img src="{{ $item['img'] }}"
                         alt="{{ $item['alt'] }}"
                         class="w-full h-64 object-cover rounded-t-2xl mb-6">
                    <div class="px-6 pb-8">
                        <span class="text-[10px] font-bold text-{{ $item['color'] ?? 'accent-purple' }} uppercase tracking-[0.2em] mb-2 block">
                            {{ $item['category'] }}
                        </span>
                        <h4 class="text-heading-3 font-bold text-ink mb-2">
                            {{ $item['title'] }}
                        </h4>
                        <p class="text-body-md text-ink-secondary leading-[1.6]">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>