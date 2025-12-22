@extends('layouts.gestor.gestor')

@section('title', 'Card - ')
@section('header-title', 'Card')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.slide') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Ordem</th>
                    <th>Promocional</th>
                    <th><i class="fas fa-calendar-alt"></i> Cadastro</th>
                    <th><i class="fas fa-calendar-alt"></i> Atualização</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($slides as $slide)
                    <tr>
                        <td>{{ $slide->titulo }}</td>
                        <td>{{ $slide->ordem }}</td>
                        <td>{{ $slide->promocional ? 'Sim' : 'Não' }}</td>
                        <td>{{ $slide->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $slide->updated_at->format('d/m/Y H:i') }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('gestor.slide', $slide->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form-{{ $slide->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="logout-form-{{ $slide->id }}"
                                  action="{{ route('gestor.slides.destroy', $slide->id) }}" method="POST"
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
        {{ $slides->links() }}
    </div>
@endsection
