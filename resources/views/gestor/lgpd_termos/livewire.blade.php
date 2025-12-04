@extends('layouts.gestor.gestor')

@section('title', ($id ? 'Visualizar Termo - ' : 'Atualizar Termo - '))
@section('header-title', ($id ? 'Visualizar Termo' : 'Atualizar Termo'))

@section('card-tools')
    <a class="btn btn-default content animate__animated animate__flipInX"
       href="{{ route('gestor.lgpd_termos.index') }}">
        <i class="nav-icon fas fa-arrow-left"></i>
        Voltar
    </a>
@endsection

@section('content')
    <livewire:gestor.lgpd-termo :id="$id">
@endsection