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

<nav class="sticky top-0 w-full z-50 bg-[#121212] border-b border-[#252525]">
    <div class="flex items-center justify-between px-16 py-4 max-w-[1280px] mx-auto">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[#1ed760] text-3xl">play_circle</span>
            <span class="text-[24px] font-bold text-white">SI TADULAKO</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}"
                    class="{{ $link['active'] ? 'text-white font-bold' : 'text-[#b3b3b3] hover:text-white' }} text-[14px] font-bold transition-colors">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
        <div class="flex gap-4">
            <a href="{{ route('documents.index') }}"
                class="bg-white text-[#121212] px-8 py-3 rounded-full text-[14px] font-bold uppercase tracking-[1.4px] hover:scale-105 transition-transform">
                DOKUMEN
            </a>
            <a href="/admin"
                class="bg-white text-[#121212] px-8 py-3 rounded-full text-[14px] font-bold uppercase tracking-[1.4px] hover:scale-105 transition-transform">
                ADMIN
            </a>
        </div>
    </div>
</nav>