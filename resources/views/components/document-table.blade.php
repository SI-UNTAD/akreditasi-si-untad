{{-- resources/views/components/document-table.blade.php --}}

@props(['documents'])

<div class="overflow-x-auto">
    <table class="w-full text-left font-label-sm">
        <thead>
            <tr class="border-b border-outline-variant/50">
                <th class="py-3 px-3 text-primary font-bold w-10">No</th>
                <th class="py-3 px-3 text-primary font-bold min-w-[100px]">Nomor Dokumen</th>
                <th class="py-3 px-3 text-primary font-bold">Nama Dokumen</th>
                <th class="py-3 px-3 text-primary font-bold min-w-[180px]">Deskripsi</th>
                <th class="py-3 px-3 text-primary font-bold w-20 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-on-surface-variant">
            @foreach ($documents as $index => $document)
                <tr class="border-b border-outline-variant/20 table-row-hover
                           transition-colors duration-150">
                    <td class="py-4 px-3 tabular-nums">{{ $index + 1 }}</td>
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
                    <td class="py-4 px-3 text-outline text-sm italic">
                        {{ $document->description }}
                    </td>
                    <td class="py-4 px-3">
                        <x-document-actions :document="$document" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>