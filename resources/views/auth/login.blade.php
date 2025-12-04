@section('title', 'Login - ')
@section('header-title', 'Digite seus dados para iniciar')
@extends('layouts.site.site')

@section('content')
    <div class="row" style="margin-bottom: 5em">
        <div class="col-lg-4 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
            <h4 class="mb-4 profile-title">Entrar</h4>
            <div id="edit_profile">
                <div class="p-0">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   required
                                   autofocus placeholder="E-mail" value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">
                                        Lembrar-me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-success btn-block">ENTRAR</button>
                            </div>
                            <!-- /.col -->
                        </div>

                        @if (Route::has('password.request'))
                            <p class="mt-2 mb-1">
                                <a href="{{ route('password.request') }}" style="color: #7e7e7e">
                                    Esqueci minha senha
                                </a>
                            </p>
                        @endif

                        <p class="mt-2 mb-1">
                            <a href="{{ route('registro') }}" class="btn btn-success btn-block" style="color: #fff">
                                QUERO ME CADASTRAR
                            </a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
