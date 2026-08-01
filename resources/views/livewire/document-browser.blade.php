<div>
    {{-- Hero Header --}}
    <div class="flex flex-col gap-4 mx-8">
        <h1 class="font-h1 text-h1 text-primary dark:text-primary-fixed leading-tight">
            Pusat Dokumen Akreditasi Program Studi
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl">
            Akses cepat dan terstruktur ke seluruh dokumen standar akreditasi
            melalui hirarki PPEPP (Penetapan, Pelaksanaan, Evaluasi, Pengendalian, Peningkatan).
        </p>
    </div>

    {{-- Search --}}
    <div class="mx-8 mt-6">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari judul atau nomor dokumen..."
            class="w-full px-4 py-3 bg-surface-container text-on-surface rounded-xl border border-outline-variant/30 focus:outline-none focus:ring-2 focus:ring-primary" />
    </div>

    {{-- Filter Bar (only when filtering) --}}
    @if ($this->isFiltering)
        <livewire:search-results :search="$search" :selectedCategory="$selectedCategory" :selectedYear="$selectedYear"
            :selectedCriteria="$selectedCriteria" :selectedType="$selectedType" :sortBy="$sortBy" :sortDir="$sortDir"
            :years="$years" :types="$types" :criteriaOptions="$criteriaOptions" :key="'search-results-' . $search . $selectedCategory . $selectedYear . $selectedCriteria . $selectedType . $sortBy . $sortDir" />
    @else
        {{-- Accordion List --}}
        <div class="flex flex-col gap-6 mt-6 mx-8">
            @forelse ($criteriaList as $criteria)
                <x-criteria-accordion :criteria="$criteria" :lazy="true" />
            @empty
                <x-empty-state icon="inventory_2" message="Belum ada kriteria yang dikonfigurasi." />
            @endforelse
        </div>
    @endif
</div>