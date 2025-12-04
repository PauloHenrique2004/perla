@section('title', 'Meus Endereços - ')
@section('header-title', 'Meus Endereços')
@extends('layouts.site.site')

@section('content-content')
    @foreach($enderecos as $endereco)
        <div class="custom-control custom-radio px-0 mb-3 position-relative border-custom-radio">
            <label class="custom-control-label w-100" for="">
                <div class="p-3 bg-white rounded shadow-sm w-100">
                    <div class="d-flex align-items-center mb-2">
                        <p class="mb-0 h6">
                            {{ $endereco->endereco }} {{ $endereco->numero }},
                            {{ $endereco->enderecoAtendido->bairroNome() }}
                        </p>
                    </div>

                    <p class="small text-muted m-0">{{ $endereco->complemento }}</p>

                    <p class="small text-muted m-0">
                        {{ $endereco->enderecoAtendido->municipio->nome() }} - {{ $endereco->enderecoAtendido->uf }}
                    </p>
                    <p class="pt-2 m-0 text-right">
                    <span class="small">
                        <a href="{{ route('user.meus-enderecos.edit', $endereco) }}"
                           class="text-decoration-none text-success">
                            <i class="icofont-edit"></i> Editar
                        </a>
                    </span>

                        <span class="small ml-3">
                        <a href="#"
                           onclick="event.preventDefault(); document.getElementById('endereco-form-{{ $endereco->id }}').submit();"
                           class="text-decoration-none text-danger">
                            <i class="icofont-trash"></i> Remover
                        </a>
                    </span>
                    </p>
                </div>
            </label>
        </div>

        <form id="endereco-form-{{ $endereco->id }}" action="{{ route('user.meus-enderecos.destroy', $endereco) }}"
              method="POST"
              style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection

@include('user._user')
