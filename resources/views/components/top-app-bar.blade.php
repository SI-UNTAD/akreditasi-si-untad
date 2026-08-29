{{-- resources/views/components/top-app-bar.blade.php --}}

@php
    $currentRoute = request()->routeIs('home') ? 'home' : 'documents';

    $navLinks = [
        ['label' => 'Profile', 'href' => '#profile', 'active' => true],
        ['label' => 'Achievement', 'href' => '#achievement', 'active' => false],
        ['label' => 'Vision & Mission', 'href' => '#visi-misi', 'active' => false],
        ['label' => 'Faculty Structure', 'href' => '#struktur', 'active' => false],
        ['label' => 'Policy', 'href' => '#policy', 'active' => false],
    ];
@endphp

<nav class="sticky top-0 w-full z-50 bg-canvas border-b border-hairline">
    <div class="flex items-center justify-between px-margin-page max-w-container-max mx-auto py-4">
        <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="IS TADULAKO Home">
            <span class="material-symbols-outlined text-primary text-3xl">school</span>
            <span class="text-h3 font-bold text-ink">IS TADULAKO</span>
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
                class="pill-button bg-primary text-on-primary px-6 py-2 text-body-sm hover:bg-primary-active transition-all duration-150 hover:scale-[0.98]">
                Dokumen
            </a>
            <a href="/admin"
                class="pill-button bg-canvas text-ink border border-hairline px-6 py-2 text-body-sm hover:bg-canvas-soft transition-colors">
                Admin
            </a>
        </div>
    </div>
</nav>