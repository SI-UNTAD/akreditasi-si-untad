{{-- resources/views/components/breadcrumb.blade.php --}}

@props(['items' => []])

<nav aria-label="Breadcrumb"
     class="flex text-on-surface-variant dark:text-outline font-label-sm text-label-sm">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        @foreach ($items as $i => $item)
            <li class="inline-flex items-center">
                @if (!$loop->first)
                    <span class="material-symbols-outlined mx-1 text-sm opacity-50">
                        chevron_right
                    </span>
                @endif

                @if ($loop->last)
                    <span class="text-secondary dark:text-secondary-fixed font-semibold">
                        {{ $item['label'] }}
                    </span>
                @else
                    <a href="{{ $item['url'] ?? '#' }}"
                       class="hover:text-primary dark:hover:text-primary-fixed transition-colors">
                        {{ $item['label'] }}
                    </a>
                @endif
            </li>
        @endforeach
    </ol>
</nav>