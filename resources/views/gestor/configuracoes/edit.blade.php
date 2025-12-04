@extends('layouts.gestor.gestor')

@section('title', 'Home - ')
@section('header-title', 'Configurações - Editar')

@section('content')
    @include('gestor.configuracoes._form', ['action' => route('gestor.configuracoes.update', 1), 'method' => 'PUT'])
@endsection
