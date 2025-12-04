@extends('layouts.gestor.gestor')

@section('title', 'Páginas - ')
@section('header-title', 'Páginas')

{{--@section('card-tools')--}}
{{--    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.pagina') }}">--}}
{{--        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar--}}
{{--    </a>--}}
{{--@endsection--}}

@section('content')
    <div class="card-body">

        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get" action="{{ route('gestor.paginas.index') }}">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input name="titulo" placeholder="Pesquisa por título" class="form-control"
                           type="text" value="{{ request()->query('titulo') }}">

                    <select class="custom-select" name="categoria_id">
                        <option value="">Categoria</option>
                        @foreach($categorias as $categoria)
                            <optgroup label="{{ $categoria->nome }}">
                                @foreach($categoria->subCategorias as $subCategoria)
                                    <option value="{{$subCategoria->id}}"
                                            @if(request()->query('categoria_id') == $subCategoria->id) selected @endif>
                                        {{ $subCategoria->nome }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>
                        <a class="btn btn-default ml-1" href="{{ route('gestor.paginas.index') }}">Limpar</a>
                    </div>
                </div>
            </div>
        </form>
        <!---------------- / Busca ---------------->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th><i class="fas fa-calendar-alt"></i> Cadastro</th>
                    <th><i class="fas fa-calendar-alt"></i> Atualização</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($paginas as $pagina)
                    <tr>
                        <td>{{ $pagina->titulo }}</td>
                        <td>{{ $pagina->categoria->nome }}</td>
                        <td>{{ $pagina->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $pagina->updated_at->format('d/m/Y H:i') }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('gestor.pagina', $pagina->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form-{{ $pagina->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="logout-form-{{ $pagina->id }}"
                                  action="{{ route('gestor.paginas.destroy', $pagina->id) }}" method="POST"
                                  style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                            <!-- / Remover -->
                        </td>
                        <!-- / Ações -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        {{ $paginas->links() }}
    </div>
@endsection
