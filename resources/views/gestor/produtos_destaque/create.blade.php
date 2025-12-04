@extends('layouts.gestor.gestor')

@section('title', 'Cadastrar - Destaque de produtos - ')
@section('header-title', 'Cadastrar - Destaque de produtos')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar seção de destaque</h3>
                </div>
                @include('gestor.produtos_destaque._form', [
                    'action' => route('gestor.produtos_destaque.store'),
                    'method' => 'POST'
                ])
            </div>
        </div>
    </div>
@endsection
