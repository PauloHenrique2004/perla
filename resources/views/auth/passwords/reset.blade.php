@section('title', 'Recuperar senha - ')
@section('header-title', 'Informe uma nova senha')
@extends('layouts.site.site')

@section('content')
    <div class="row" style="margin-bottom: 5em">
        <div class="col-lg-4 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
            <h4 class="mb-4 profile-title">Recuperar Senha</h4>
            <div id="edit_profile">
                <div class="p-0">

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   required
                                   placeholder="Digite seu e-mail" value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4 mb-3">
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" required
                                   placeholder="Informe uma nova senha">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" required
                                   placeholder="Confirme a senha">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block">Alterar senha</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
