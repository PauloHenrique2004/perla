@extends('layouts.gestor.gestor')

@section('title', 'Editar - Topo Banner - ')
@section('header-title', 'Editar - Topo Banner')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Topo Banner</h3>
                </div>
                @include('gestor.topo_banners._form', [
                    'action' => route('gestor.topo_banners.update', $topoBanner),
                    'method' => 'PUT'
                ])
            </div>
        </div>
    </div>
@endsection
