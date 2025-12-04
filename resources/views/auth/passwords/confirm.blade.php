@section('title', 'Confirmação de senha - ')
@section('header-title', 'Confirme sua senha para continuar.')
@extends('layouts.site.site')

@section('content')
    <div class="row" style="margin-bottom: 5em">
        <div class="col-lg-4 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
            <h4 class="mb-4 profile-title">Entrar</h4>
            <div id="edit_profile">
                <div class="p-0">

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" required
                                   placeholder="Senha">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block">Continuar</button>
                            </div>
                        </div>

                        @if (Route::has('password.request'))
                            <p class="mt-2 mb-1">
                                <a href="{{ route('password.request') }}">
                                    Esqueci minha senha
                                </a>
                            </p>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
