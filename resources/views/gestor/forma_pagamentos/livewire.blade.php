@extends('layouts.gestor.gestor')

@section('title', 'Formulário Forma de Pagamento - ')
@section('header-title', 'Formulário Forma de Pagamento')

@section('content')
    <livewire:gestor.forma-pagamento :id="$id">
@endsection
