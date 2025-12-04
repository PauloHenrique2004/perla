@extends('layouts.gestor.gestor')

@section('title', 'Formulário Produto Categoria - ')
@section('header-title', 'Formulário Produto Categoria')

@section('content')
    <livewire:gestor.produto-categoria :id="$id">
@endsection
