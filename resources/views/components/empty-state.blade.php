{{-- resources/views/components/empty-state.blade.php --}}

@props([
    'message' => 'Tidak ada data yang tersedia.',
    'icon'    => 'folder_open',
])

<div class="py-10 flex flex-col items-center gap-3 text-outline">
    <span class="material-symbols-outlined text-4xl opacity-40">{{ $icon }}</span>
    <p class="font-label-sm text-label-sm italic">{{ $message }}</p>
</div>