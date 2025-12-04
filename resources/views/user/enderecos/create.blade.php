@section('title', 'Cadastrar Endereço - ')
@section('header-title', 'Cadastrar Endereço')
@extends('layouts.site.site')

@section('content-content')
    <livewire:user.user-endereco :endereco="$endereco"/>
@endsection

@include('user._user')
