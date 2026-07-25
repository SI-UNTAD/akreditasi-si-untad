{{-- resources/views/home.blade.php --}}

@extends('layouts.app')

@section('title', 'IS TADULAKO — Profile Sistem Informasi Universitas Tadulako')

@section('head')
<style>
    .circuit-bg {
        background-image: radial-gradient(circle at 2px 2px, rgba(0,61,155,0.05) 1px, transparent 0);
        background-size: 40px 40px;
    }
    .elegant-line {
        background: linear-gradient(90deg, transparent, #003d9b, transparent);
        height: 1px;
        width: 100%;
    }
</style>
@endsection

@section('content')
    <x-home.hero />
    <x-home.vision-mission />
    <x-home.graduate-profiles />
    <x-home.achievements :achievements="$achievements" />
    <x-home.org-structure :structure="$orgStructure" />
@endsection