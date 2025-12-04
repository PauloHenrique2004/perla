@section('title', 'Editar Endereço - ')
@section('header-title', 'Editar Endereço')
@extends('layouts.site.site')

@section('content-content')
    <livewire:user.user-endereco :endereco="$endereco"/>
@endsection

@include('user._user')
