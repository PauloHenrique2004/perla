@extends('emails.layouts.default.default')

@section('content')
    <p>Cliente tem interesse em um imóvel.</p>

    <p>Imóvel: {{ $imovel->nome }}</p>
    <p>Cliente: {{ $nome }}</p>
    <p>Telefone: {{ $telefone }}</p>
    <p>E-mail: {{ $email }}</p>
    <p>Descrição: {{ $descricao }}</p>
@endsection
