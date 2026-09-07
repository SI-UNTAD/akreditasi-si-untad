{{-- resources/views/components/top-app-bar.blade.php --}}

@php
    $currentRoute = request()->routeIs('home') ? 'home' : 'documents';

    $navLinks = [
        ['label' => 'Profil', 'href' => '#profile', 'active' => false],
        ['label' => 'Pencapaian', 'href' => '#achievement', 'active' => false],
        ['label' => 'Visi & Misi', 'href' => '#visi-misi', 'active' => false],
        ['label' => 'Struktur Fakultas', 'href' => '#struktur', 'active' => false],
    ];
@endphp

<nav class="fixed top-0 z-50 bg-canvas border-b border-hairline ">
    <div class="flex items-center justify-center gap-4 md:gap-8 lg:gap-12 xl:gap-48 py-2 w-screen">
        <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="IS TADULAKO Home">
            <img src="{{ asset('images/logo.webp') }}" alt="Sistem Informasi" class="w-16  h-16 object-cover">
            <span class="text-h3 font-bold text-accent-si">SI TADULAKO</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}"
                    class="{{ $link['active'] ? 'text-primary font-bold' : 'text-body-sm text-ink-secondary hover:text-ink' }} font-medium transition-colors">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('documents.index') }}"
                class="pill-button bg-green-600 text-on-primary px-4 py-2 text-body-sm hover:bg-green-800 transition-all duration-150 hover:scale-[0.98]">
                Dokumen
            </a>
            <a href="/admin"
                class="pill-button bg-canvas text-ink border border-hairline px-4 py-2 text-body-sm hover:bg-canvas-soft transition-colors">
                Admin
            </a>
        </div>
    </div>
</nav>