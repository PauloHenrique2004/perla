@extends('layouts.gestor.gestor')

@section('title', 'Cadastrar - Topo Banner - ')
@section('header-title', 'Cadastrar - Banner principal')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Banner principal</h3>
                </div>
                @include('gestor.topo_banners._form', [
                    'action' => route('gestor.topo_banners.store'),
                    'method' => 'POST'
                ])
            </div>
        </div>
    </div>
@endsection
