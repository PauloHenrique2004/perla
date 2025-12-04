@section('title', "{$produto->nome} - ")
@section('og:title', $produto->nome)
@section('og:image', asset($produto->thumbnailUrl()))
@section('description', $produto->nome)

@extends('layouts.site.site')

@section('before-content')
    <livewire:site.produto.produto :id="$produto->id">
@endsection
