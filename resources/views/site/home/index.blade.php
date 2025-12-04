@section('before-content')
    @include('site.home._banner_principal')
@endsection


@extends('layouts.site.site')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- home page -->
            <div class="osahan-home-page">
                <!-- body -->
                <div class="osahan-body">
                    @include('site.home._beneficios')
                    @include('site.home._categorias')
                    @include('site.home._slide')
                    @include('site.home._produtos')
                </div>
            </div>
        </div>

        @include('site.home._whatsapp')
    </div>

    <style>
        .osahan-master-body {
            margin-top: 0;
            padding-top: 0 !important
        }
    </style>
@endsection
