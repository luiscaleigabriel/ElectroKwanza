@extends('site.master')

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cadastro</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Cadastro</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>Seja bem-vindo!</h3>
                            <p>O registo demora menos de um minuto, mas dá-lhe controlo total sobre os seus pedidos.</p>
                        </div>

                        <form class="row" method="POST" action="{{ route('register.store') }}">
                            @csrf

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Primeiro Nome</label>
                                    <input class="form-control @error('firstname') is-invalid @enderror" type="text"
                                        id="firstname" name="firstname" value="{{ old('firstname') }}" autofocus>
                                    @error('firstname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Último Nome</label>
                                    <input class="form-control @error('lastname') is-invalid @enderror" type="text"
                                        id="lastname" name="lastname" value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Nº de Telefone</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                        id="phone" name="phone" value="{{ old('phone') }}" placeholder="9XXXXXXXX">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        id="password" name="password" minlength="8">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Mínimo 8 caracteres</small>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Senha</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password_confirmation"
                                        name="password_confirmation">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox"
                                        id="terms" name="terms">
                                    <label class="form-check-label" for="terms">
                                        Concordo com os <a href="{{ route('home.about') }}">Termos e Condições</a>
                                    </label>
                                    @error('terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="button">
                                <button class="btn" type="submit">Cadastrar</button>
                            </div>

                            <p class="outer-link">Já tem uma conta? <a href="{{ route('login') }}">Entrar Agora</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
@endsection
