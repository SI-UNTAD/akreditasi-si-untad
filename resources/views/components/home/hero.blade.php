{{-- resources/views/components/home/hero.blade.php --}}

<header id="profile" class="relative bg-canvas min-h-[560px] flex items-center">
    <div class="relative z-10 max-w-container-max mx-auto px-margin-page w-full">
        <div class="lg:grid lg:h-screen lg:place-content-center">
            <div
                class="mx-auto w-screen max-w-7xl px-4 py-16 sm:px-6 sm:py-24 md:grid md:grid-cols-2 md:items-center md:gap-4 lg:px-8 lg:py-32">
                <div class="max-w-prose text-left">
                    <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">
                        Selamat Datang di
                        <strong class="text-accent-green"> Sistem Informasi </strong>
                        Universitas Tadulako
                    </h1>

                    <p class="mt-4 text-base text-pretty text-gray-700 sm:text-lg/relaxed">
                        Kami mempersiapkan talenta digital dengan fondasi akademik kuat, riset inovatif Data Science & AI, serta jiwa pengabdian kepada masyarakat.
                    </p>

                    <div class="mt-4 flex gap-4 sm:mt-6">
                        <a class="inline-block rounded-lg border border-green-600 bg-green-600 px-5 py-3 font-medium text-white shadow-sm transition-colors hover:bg-green-900"
                            href="#">
                            Mulai Eksplorasi
                        </a>

                        <a class="inline-block rounded-lg border border-gray-200 px-5 py-3 font-medium text-gray-700 shadow-sm transition-colors hover:bg-gray-50 hover:text-gray-900"
                            href="{{ route('documents.index') }}">
                            Unduh Dokumen
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="feature-card-elevated overflow-hidden rounded-lg">
                        <img src="{{ asset('images/lab.webp') }}" alt="Sistem Informasi"
                            class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </div>
</header>