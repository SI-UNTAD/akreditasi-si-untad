{{-- resources/views/documents/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Pusat Dokumen Akreditasi — IS TADULAKO')

@section('content')

    {{-- Breadcrumb --}}
    <x-breadcrumb :items="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Dokumen Akreditasi'],
    ]" />

    {{-- Hero Header --}}
    <div class="flex flex-col gap-4 mx-8 ">
        <h1 class="font-h1 text-h1 text-primary dark:text-primary-fixed leading-tight">
            Pusat Dokumen Akreditasi Program Studi
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl">
            Akses cepat dan terstruktur ke seluruh dokumen standar akreditasi
            melalui hirarki PPEPP (Penetapan, Pelaksanaan, Evaluasi, Pengendalian, Peningkatan).
        </p>
    </div>

    {{-- Accordion List --}}
    <div class="flex flex-col gap-6">
        @forelse ($criteriaList as $criteria)
            <x-criteria-accordion :criteria="$criteria" :lazy="true" />
        @empty
            <x-empty-state
                icon="inventory_2"
                message="Belum ada kriteria yang dikonfigurasi."
            />
        @endforelse
    </div>

@endsection