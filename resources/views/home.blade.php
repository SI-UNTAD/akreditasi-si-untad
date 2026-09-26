{{-- resources/views/home.blade.php --}}

@extends('layouts.app')

@section('title', 'SI UNTAD — Profile Sistem Informasi Universitas Tadulako')

@section('head')
<style>
    .elegant-line {
        background: linear-gradient(90deg, transparent, var(--color-primary), transparent);
        height: 1px;
        width: 100%;
    }
</style>
@endsection

@section('content')
    <x-top-app-bar />
    <x-home.hero />
    <x-home.vision-mission :id="'visi-misi'" />
    <x-home.achievements :achievements="$achievements" />
    <x-home.org-structure :structure="$orgStructure" />
    <x-footer />
@endsection