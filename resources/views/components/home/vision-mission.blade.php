{{-- resources/views/components/home/vision-mission.blade.php --}}

@props(['id' => 'visi-misi'])

<section class="py-section-gap max-w-container-max mx-auto px-margin-page bg-canvas" id="visi-misi">
    <div class="text-center mb-16">
        <h2 class="font-bold text-4xl text-accent-green mb-4">Visi &amp; Misi</h2>
    </div>
    <div></div>
    <div class="grid grid-cols-1 md:grid-cols-6 gap-6 mx-auto w-screen max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Vision Card -->
        <div
            class="md:col-span-4 glass-card p-10 rounded-3xl border border-outline-variant/30 flex flex-col justify-center h-64">
            <span class="material-symbols-outlined text-accent-green text-5xl mb-6"
                data-icon="visibility">visibility</span>
            <h3 class="font-bold text-h2 text-accent-green mb-4">Visi Program Studi</h3>
            <p class="font-body-lg text-body-lg text-on-surface-variant">
                Program studi berstandar Internasional yang unggul dalam pengembangan ilmu pengetahuan, teknologi dan
                sistem informasi cerdas yang berwawasan lingkungan.
            </p>
        </div>
        <!-- Stat 1 -->
        <div
            class="hidden md:block md:col-span-2 bg-primary-container text-on-primary-container px-10 rounded-3xl flex flex-col items-center justify-center text-center">
            <img src="{{ asset('images/pencapaian1.webp') }}" alt="Sistem Informasi"
                class="w-full h-64 object-cover rounded-xl">
        </div>
        <!-- Stat 2 -->
        <div
            class="hidden md:block md:col-span-2 bg-secondary-fixed text-on-secondary-fixed p-10 rounded-3xl flex flex-col items-center justify-center text-center">
            <img src="{{ asset('images/pencapaian2.webp') }}" alt="Sistem Informasi"
                class="w-full h-auto object-cover rounded-xl">
        </div>
        <!-- Mission Card -->
        <div class="md:col-span-4 glass-card p-10 rounded-3xl border border-outline-variant/30 flex flex-col justify-center">
            <h3 class="font-bold text-h3 text-accent-green mb-6">Misi Strategis</h3>
            <ul class="space-y-4">
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-accent-green mt-1"
                        data-icon="check_circle">check_circle</span>
                    <p class="font-body-md text-on-surface-variant"> Menyelenggarakan pendidikan standar internasional
                        yang menghasilkan lulusan adaptif terhadap perkembangan teknologi & sistem informasi cerdas
                        berwawasan lingkungan.</p>
                </li>
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-accent-green mt-1"
                        data-icon="check_circle">check_circle</span>
                    <p class="font-body-md text-on-surface-variant">Mengembangkan penelitian inovatif bidang teknologi &
                        sistem informasi cerdas berwawasan lingkungan.</p>
                </li>
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-accent-green mt-1"
                        data-icon="check_circle">check_circle</span>
                    <p class="font-body-md text-on-surface-variant">Mengimplementasikan solusi berbasis teknologi sistem
                        informasi cerdas berwawasan lingkungan untuk peningkatan kualitas hidup masyarakat.</p>
                </li>
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-accent-green mt-1"
                        data-icon="check_circle">check_circle</span>
                    <p class="font-body-md text-on-surface-variant">Mengembangkan kerja sama strategis dengan industri,
                        dunia usaha, & institusi nasional/internasional untuk pengembangan & implementasi teknologi
                        sistem informasi cerdas berwawasan lingkungan.</p>
                </li>
            </ul>
        </div>
    </div>
</section>