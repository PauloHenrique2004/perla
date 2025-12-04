@extends('layouts.gestor.gestor')

@section('title', 'Editar - Destaque de produtos - ')
@section('header-title', 'Editar - Destaque de produtos')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar seção de destaque</h3>
                </div>
                @include('gestor.produtos_destaque._form', [
                    'action' => route('gestor.produtos_destaque.update', $destaque),
                    'method' => 'PUT'
                ])
            </div>
        </div>
    </div>
@endsection
