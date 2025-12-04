@extends('layouts.gestor.gestor')

@section('title', 'Formulário Gestor - ')
@section('header-title', 'Formulário Gestor')

@section('content')
    <livewire:gestor.gestores.gestor :id="$id">
@endsection
