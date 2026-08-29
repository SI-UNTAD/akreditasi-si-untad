{{-- resources/views/components/home/hero.blade.php --}}

<header id="profile"
        class="relative bg-secondary min-h-[560px] flex items-center overflow-hidden">
    <div class="absolute inset-0">
        {{-- Sticker constellation decorative --}}
        <div class="absolute top-1/4 left-1/4 w-32 h-32 rounded-full bg-accent-sky/20 blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-24 h-24 rounded-full bg-accent-purple/20 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 w-16 h-16 rounded-full bg-accent-pink/15 blur-2xl"></div>
    </div>

    <div class="relative z-10 max-w-container-max mx-auto px-margin-page w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center w-full">
            <div>
                <h1 class="text-display-1 font-bold text-white leading-tight tracking-tight-display-1">
                    Profile Sistem Informasi
                </h1>
                <p class="text-body-lg text-white/80 mt-6 mb-10 max-w-lg">
                    Empowering digital leaders at Universitas Tadulako.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#visi-misi"
                        class="pill-button bg-primary text-on-primary px-8 py-4 text-button hover:bg-primary-active hover:scale-[0.98] transition-transform duration-150">
                        Explore
                    </a>
                    <a href="{{ route('documents.index') }}"
                        class="pill-button bg-canvas text-ink border border-hairline px-8 py-4 text-button hover:bg-canvas-soft hover:scale-[0.98] transition-transform duration-150">
                        Dokumen
                    </a>
                </div>
            </div>

            <div class="hidden lg:block">
                <div class="feature-card-elevated overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=800&auto=format&fit=crop&q=60"
                         alt="Teknologi Informasi"
                         class="w-full h-auto object-cover">
                </div>
            </div>
        </div>
    </div>
</header>