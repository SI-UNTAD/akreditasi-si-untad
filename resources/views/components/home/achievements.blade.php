{{-- resources/views/components/home/achievements.blade.php --}}

@props(['achievements' => [], 'id' => 'achievement'])

<section id="{{ $id }}"
         class="py-[120px] bg-[#f0f3ff] overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-16">

        <div class="flex flex-col md:flex-row md:items-end
                    justify-between mb-16 gap-6">
            <div>
                <h2 class="text-[32px] font-semibold text-[#003d9b] mb-2">
                    Prestasi Mahasiswa
                </h2>
                <p class="text-[#434654]">
                    Dedikasi dan inovasi yang melampaui batas ekspektasi.
                </p>
            </div>
            <button class="flex items-center gap-2 text-[#003d9b] font-bold group">
                View All Achievements
                <span class="material-symbols-outlined
                             group-hover:translate-x-2 transition-transform">
                    arrow_forward
                </span>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($achievements as $item)
                <div class="glass-card rounded-2xl p-2
                            hover:scale-105 transition-transform duration-300">
                    <img src="{{ $item['img'] }}"
                         alt="{{ $item['alt'] }}"
                         class="w-full h-64 object-cover rounded-xl mb-6"
                         loading="lazy">
                    <div class="px-4 pb-6">
                        <span class="text-[10px] font-bold text-[#735c00]
                                     uppercase tracking-[0.2em] mb-2 block">
                            {{ $item['category'] }}
                        </span>
                        <h4 class="text-[24px] font-semibold text-[#003d9b] mb-2">
                            {{ $item['title'] }}
                        </h4>
                        <p class="text-[#434654] text-[16px] leading-[1.6]">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>