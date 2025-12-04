@extends('layouts.gestor.gestor')

@section('title', 'Destaques de produtos - ')
@section('header-title', 'Destaques de produtos')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Seções de destaque da home</h3>
                    <div class="card-tools">
                        @if($destaques->total() < 3)
                            <a class="btn btn-sm btn-primary" href="{{ route('gestor.produtos_destaque.create') }}">
                                <i class="fas fa-plus"></i> Adicionar seção
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Nome da seção</th>
                            <th style="width:100px;">Ativo</th>
                            <th style="width:120px;">Ordem</th>
                            <th style="width:220px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($destaques as $destaque)
                            <tr>
                                <td>{{ $destaque->nome }}</td>
                                <td>{{ $destaque->ativo ? 'Sim' : 'Não' }}</td>
                                <td>{{ $destaque->ordem }}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-primary" href="{{ route('gestor.produtos_destaque.edit', $destaque->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a>
                                    <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                                       href="#"
                                       onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir?')) document.getElementById('delete-form-{{ $destaque->id }}').submit();">
                                        <i class="fas fa-trash"></i> Excluir
                                    </a>
                                    <form id="delete-form-{{ $destaque->id }}" action="{{ route('gestor.produtos_destaque.destroy', $destaque->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhuma seção de destaque cadastrada.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $destaques->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
