@extends('layouts.gestor.gestor')

@section('title', 'Banners principais - ')
@section('header-title', 'Banners principais')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Banners principais</h3>
                    <div class="card-tools">
                        <a class="btn btn-sm btn-primary" href="{{ route('gestor.topo_banners.create') }}">
                            <i class="fas fa-plus"></i> Adicionar
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width:160px;">Desktop</th>
                            <th style="width:120px;">Mobile</th>
                            <th>Título</th>
                            <th>Link</th>
                            <th style="width:100px;">Ativo</th>
                            <th style="width:120px;">Ordem</th>
                            <th style="width:220px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($topoBanners as $banner)
                            <tr>
                                <td>
                                    @if($banner->imagem_desktop)
                                        <img style="max-width: 140px; height:auto;"
                                             src="{{ Storage::disk('storage_configuracoes')->url($banner->imagem_desktop) }}"
                                             alt="Desktop {{ $banner->titulo }}">
                                    @endif
                                </td>
                                <td>
                                    @if($banner->imagem_mobile)
                                        <img style="max-width: 100px; height:auto;"
                                             src="{{ Storage::disk('storage_configuracoes')->url($banner->imagem_mobile) }}"
                                             alt="Mobile {{ $banner->titulo }}">
                                    @endif
                                </td>
                                <td>{{ $banner->titulo }}</td>
                                <td>{{ $banner->link }}</td>
                                <td>{{ $banner->ativo ? 'Sim' : 'Não' }}</td>
                                <td>{{ $banner->ordem }}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-primary" href="{{ route('gestor.topo_banners.edit', $banner->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a>
                                    <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                                       href="#"
                                       onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir?')) document.getElementById('delete-form-{{ $banner->id }}').submit();">
                                        <i class="fas fa-trash"></i> Excluir
                                    </a>
                                    <form id="delete-form-{{ $banner->id }}" action="{{ route('gestor.topo_banners.destroy', $banner->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Nenhum topo banner cadastrado.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $topoBanners->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
