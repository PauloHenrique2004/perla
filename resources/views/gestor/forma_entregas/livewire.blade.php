@extends('layouts.gestor.gestor')

@section('title', 'Formulário Forma de Entrega - ')
@section('header-title', 'Formulário Forma de Entrega')

@section('content')
    <livewire:gestor.forma-entrega :id="$id">
@endsection
