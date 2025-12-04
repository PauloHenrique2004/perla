@section('title', 'Esqueci minha senha - ')
@section('header-title', 'Esqueci minha senha')
@extends('layouts.site.site')

@section('content')
    <div class="row" style="margin-bottom: 5em">
        <div class="col-lg-4 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
            <h4 class="mb-4 profile-title">Recuperar Senha</h4>
            <div id="edit_profile">
                <div class="p-0">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   required
                                   autofocus placeholder="Digite seu e-mail" value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block">Recuperar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
