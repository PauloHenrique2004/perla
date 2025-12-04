@section('title', "$pagina->titulo - ")
@section('og:title', $pagina->titulo)
@section('description', $pagina->titulo)

@extends('layouts.site.site')

@section('content')
    @include('layouts.site.includes.banner', ['nome' => $pagina->titulo])

    <section class="welcome-section section-padding">
        <div class="container">
            <div class="section-title">
                <p>
                    {!! $pagina->conteudo !!}
                </p>
            </div>

        </div>
    </section>

    <style>
        .page-image {
            height: 200px;
            width: 100%;
            margin-bottom: 1em
        }

        @media only screen and (max-width: 600px) {
            .page-image {
                height: 100px;
            }
        }
    </style>
@endsection
