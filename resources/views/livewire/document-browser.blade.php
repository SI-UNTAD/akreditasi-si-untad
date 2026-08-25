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

    {{-- Filter Bar (selalu tampil) --}}
    <div class="mx-8 mt-4 flex flex-wrap gap-3">
        {{-- Category --}}
        <select wire:model.live="selectedCategory"
            class="px-3 py-2 bg-surface-container text-on-surface rounded-lg border border-outline-variant/30 text-sm">
            <option value="all">Semua Kategori</option>
            @foreach (\App\Models\Document::PPEPP_CATEGORIES as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>

        {{-- Year --}}
        <select wire:model.live="selectedYear"
            class="px-3 py-2 bg-surface-container text-on-surface rounded-lg border border-outline-variant/30 text-sm">
            <option value="all">Semua Tahun</option>
            @foreach ($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>

        {{-- Criteria --}}
        <select wire:model.live="selectedCriteria"
            class="px-3 py-2 bg-surface-container text-on-surface rounded-lg border border-outline-variant/30 text-sm">
            <option value="all">Semua Kriteria</option>
            @foreach ($criteriaOptions as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>

        {{-- Document Type --}}
        <select wire:model.live="selectedType"
            class="px-3 py-2 bg-surface-container text-on-surface rounded-lg border border-outline-variant/30 text-sm">
            <option value="all">Semua Jenis</option>
            @foreach ($types as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>

        {{-- Sort --}}
        <select wire:model.live="sortBy"
            class="px-3 py-2 bg-surface-container text-on-surface rounded-lg border border-outline-variant/30 text-sm">
            <option value="sort_order">Manual</option>
            <option value="title">Judul A→Z</option>
            <option value="year">Tahun</option>
            <option value="document_number">Nomor Dokumen</option>
        </select>

        {{-- Sort Direction --}}
        <button wire:click="toggleSort('{{ $sortBy }}')"
            class="px-3 py-2 bg-surface-container text-on-surface rounded-lg border border-outline-variant/30 text-sm">
            {{ $sortDir === 'asc' ? '↑' : '↓' }}
        </button>

        {{-- Reset --}}
        @if ($this->isFiltering)
            <button wire:click="resetFilters" class="px-3 py-2 text-primary text-sm underline">
                Reset
            </button>
        @endif
    </div>

    @if ($this->isFiltering)
        {{-- Result Count --}}
        <div class="mx-8 mt-4 text-sm text-on-surface-variant">
            Menampilkan {{ $documents->count() }} dokumen
            @if ($documents->total() > $documents->count())
                dari {{ $documents->total() }} dokumen
            @endif
        </div>

        {{-- Results Table --}}
        @if ($documents->isEmpty())
            <div class="mx-8 mt-8">
                <x-empty-state icon="search_off" message="Tidak ditemukan dokumen yang cocok." />
            </div>
        @else
            <div class="mx-8 mt-4 overflow-x-auto">
                <table class="w-full text-left font-label-sm">
                    <thead>
                        <tr class="border-b border-outline-variant/50">
                            <th class="py-3 px-3 text-primary font-bold w-10">No</th>
                            <th wire:click="toggleSort('document_number')"
                                class="py-3 px-3 text-primary font-bold min-w-[100px] cursor-pointer hover:underline">
                                Nomor Dokumen @if ($sortBy === 'document_number') {{ $sortDir === 'asc' ? '↑' : '↓' }} @endif
                            </th>
                            <th wire:click="toggleSort('title')"
                                class="py-3 px-3 text-primary font-bold cursor-pointer hover:underline">
                                Nama Dokumen @if ($sortBy === 'title') {{ $sortDir === 'asc' ? '↑' : '↓' }} @endif
                            </th>
                            <th class="py-3 px-3 text-primary font-bold">Deskripsi</th>
                            <th class="py-3 px-3 text-primary font-bold">Kriteria</th>
                            <th class="py-3 px-3 text-primary font-bold">Kategori</th>
                            <th wire:click="toggleSort('year')"
                                class="py-3 px-3 text-primary font-bold w-20 text-center cursor-pointer hover:underline">
                                Tahun @if ($sortBy === 'year') {{ $sortDir === 'asc' ? '↑' : '↓' }} @endif
                            </th>
                            <th class="py-3 px-3 text-primary font-bold w-20 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-on-surface-variant">
                        @foreach ($documents as $index => $document)
                            <tr class="border-b border-outline-variant/20 table-row-hover transition-colors duration-150">
                                <td class="py-4 px-3 tabular-nums">{{ $documents->firstItem() + $index }}</td>
                                <td class="py-4 px-3 font-mono text-xs text-outline">
                                    {{ $document->document_number ?? '—' }}
                                </td>
                                <td class="py-4 px-3">
                                    <span class="text-on-surface font-medium">{{ $document->title }}</span>
                                    @if ($document->file_size_bytes)
                                        <span class="block text-xs text-outline mt-0.5">
                                            {{ $document->file_size_human }}
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-3 text-outline text-sm italic max-w-[200px] truncate">
                                    {{ $document->description }}
                                </td>
                                <td class="py-4 px-3 text-sm">
                                    {{ $document->criteria->full_label ?? '—' }}
                                </td>
                                <td class="py-4 px-3">
                                    @php $cat = \App\Models\Document::PPEPP_CATEGORIES[$document->ppepp_category] ?? $document->ppepp_category; @endphp
                                    <span class="px-2 py-1 text-xs rounded-full
                                                @match($document->ppepp_category) {
                                                    'penetapan' => 'bg-blue-100 text-blue-800',
                                                    'pelaksanaan' => 'bg-green-100 text-green-800',
                                                    'evaluasi' => 'bg-yellow-100 text-yellow-800',
                                                    'pengendalian' => 'bg-orange-100 text-orange-800',
                                                    'peningkatan' => 'bg-purple-100 text-purple-800',
                                                    default => 'bg-gray-100 text-gray-800',
                                                }">
                                        {{ $cat }}
                                    </span>
                                </td>
                                <td class="py-4 px-3 text-center tabular-nums">{{ $document->year ?? '—' }}</td>
                                <td class="py-4 px-3">
                                    <x-document-actions :document="$document" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mx-8 mt-4">
                {{ $documents->links() }}
            </div>
        @endif
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
