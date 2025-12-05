@extends('layouts.gestor.gestor')

@section('title', 'Depoimentos - ')
@section('header-title', 'Depoimentos')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Depoimentos</h3>
                    <div class="card-tools">
                        <a class="btn btn-sm btn-primary" href="{{ route('gestor.depoimentos.create') }}">
                            <i class="fas fa-plus"></i> Adicionar
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width:80px;">Foto</th>
                            <th>Nome</th>
                            <th>Estrelas</th>
                            <th>Texto</th>
                            <th style="width:80px;">Ativo</th>
                            <th style="width:100px;">Ordem</th>
                            <th style="width:220px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($depoimentos as $dep)
                            <tr>
                                <td>
                                    @if($dep->foto)
                                        <img style="max-width: 60px; height:60px; border-radius:50%; object-fit:cover;"
                                             src="{{ Storage::disk('storage_configuracoes')->url($dep->foto) }}"
                                             alt="{{ $dep->nome }}">
                                    @endif
                                </td>
                                <td>{{ $dep->nome }}</td>
                                <td>{{ $dep->estrelas }} ★</td>
                                <td style="max-width: 350px; white-space: normal;">
                                    {{ Str::limit($dep->texto, 120) }}
                                </td>
                                <td>{{ $dep->ativo ? 'Sim' : 'Não' }}</td>
                                <td>{{ $dep->ordem }}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-primary" href="{{ route('gestor.depoimentos.edit', $dep->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a>
                                    <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                                       href="#"
                                       onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir?')) document.getElementById('delete-form-{{ $dep->id }}').submit();">
                                        <i class="fas fa-trash"></i> Excluir
                                    </a>
                                    <form id="delete-form-{{ $dep->id }}" action="{{ route('gestor.depoimentos.destroy', $dep->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Nenhum depoimento cadastrado.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $depoimentos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
