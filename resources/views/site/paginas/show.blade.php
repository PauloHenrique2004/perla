@section('title', "$pagina->titulo - ")
@section('og:title', $pagina->titulo)
@section('description', $pagina->titulo)

@extends('layouts.site.site')

@section('content')
{{--    @include('layouts.site.includes.banner', ['nome' => $pagina->titulo])--}}

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="about-card d-flex flex-column flex-md-row align-items-stretch p-4 p-md-5">

                        {{-- Imagem à esquerda --}}
                        @if(!empty($pagina->foto))
                            <div class="about-photo mb-4 mb-md-0 mr-md-4 text-center">
                                <img src="{{ Storage::disk('storage_configuracoes')->url($pagina->foto) }}"
                                     alt="{{ $pagina->titulo }}">
                            </div>
                        @endif

                        {{-- Conteúdo à direita --}}
                        <div class="about-text">
                            <h1 class="h3 mb-3 about-title">{{ $pagina->titulo }}</h1>

                            <div class="about-content text-justify">
                                {!! $pagina->conteudo !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <style>
        .about-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.06);
        }

        .about-photo img {
            max-width: 260px;
            border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .about-title {
            color: #af9174;
            font-weight: 600;
        }

        .about-content p {
            margin-bottom: .9rem;
            line-height: 1.7;
        }

        @media (max-width: 767.98px) {
            .about-card {
                text-align: center;
            }
            .about-photo {
                margin-right: 0 !important;
            }
        }
    </style>
@endsection
