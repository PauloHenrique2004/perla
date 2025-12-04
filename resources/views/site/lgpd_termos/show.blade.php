@section('title', 'Política de Privacidade')
@section('og:title', 'Política de Privacidade')
@section('description', 'Política de Privacidade')

@extends('layouts.site.site')

@section('content')
    <section class="welcome-section section-padding">
        <div class="container">
            <div class="row align-items-center  justify-content-center">
               <h4 class="text-center mt-3">Política de Privacidade</h4>
               
            </div>
            <div class="text-center mb-4 pb-3">
                    Versão {{ $lgpdTermo->id }}
            </div>
            <div class="section-title text-justify">
                <p>
                    {!! $lgpdTermo->texto !!}
                </p>
            </div>

        </div>
    </section>
@endsection