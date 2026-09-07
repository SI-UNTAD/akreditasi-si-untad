{{-- resources/views/components/footer.blade.php --}}

<footer class="mt-10 mb-5 border-t border-hairline">
    <div class="grid grid-cols-1 items-center gap-2 w-screen place-items-center">
        <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="IS TADULAKO Home">
            <img src="{{ asset('images/logo.webp') }}" alt="Sistem Informasi" class="w-16  h-16 object-cover">
        </a>

        <div class="hidden md:flex items-center gap-8">
            <h2 class="text-body-sm text-ink-muted">© 2026 SI TADULAKO, Inc. All rights reserved.</h2>
        </div>
    </div>
</footer>