@extends('site.master')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Meu Perfil</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Perfil</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <!-- Mensagem de Sucesso -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Mensagem de Erro -->
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="contact-head">
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12 mb-md-4">
                            <div class="single-info-head">
                                <!-- Start Single Info -->
                                <div class="single-info">
                                    <h3 style="font-size: 1.5rem;" class="mb-4">Opções</h3>
                                    <ul>
                                        <li style="font-size: 1.1rem;" class="mb-2"><a
                                                href="{{ route('customer.index') }}">Perfil</a></li>
                                        <li style="font-size: 1.1rem;" class="mb-2"><a
                                                href="{{ route('customer.orders') }}">Compras
                                                Realizadas</a></li>
                                        <li style="font-size: 1.1rem;" class="mb-2"><a
                                                href="{{ route('customer.newpass') }}">Alterar Senha</a>
                                        </li>
                                        <li style="font-size: 1.1rem;" class="mb-2"><a
                                                href="{{ route('auth.logout') }}">Sair</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Single Info -->
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="form-main">
                                <div class="register-form">
                                    <form class="row" method="POST" action="{{ route('customer.update') }}">
                                        @csrf

                                        <div class="col-sm-6 mb-4">
                                            <div class="form-group">
                                                <label for="firstname">Primeiro Nome</label>
                                                <input class="form-control @error('firstname') is-invalid @enderror"
                                                    type="text" id="firstname" name="firstname"
                                                    value="{{ $user->firstname }}" autofocus>
                                                @error('firstname')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-4">
                                            <div class="form-group">
                                                <label for="lastname">Último Nome</label>
                                                <input class="form-control @error('lastname') is-invalid @enderror"
                                                    type="text" id="lastname" name="lastname"
                                                    value="{{ $user->lastname }}">
                                                @error('lastname')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" id="email" name="email"
                                                    value="{{ $user->email }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-4">
                                            <div class="form-group">
                                                <label for="phone">Nº de Telefone</label>
                                                <input class="form-control @error('phone') is-invalid @enderror"
                                                    type="text" id="phone" name="phone"
                                                    value="{{ $user->phone }}" placeholder="9XXXXXXXX">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col mb-4">
                                            <div class="form-group">
                                                <label for="phone">Endereço</label>
                                                <input class="form-control @error('address') is-invalid @enderror"
                                                    type="text" id="address" name="address"
                                                    value="{{ $user->address }}" placeholder="Endereço">
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="button">
                                            <button class="btn" type="submit">Atualizar Dados</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->
@endsection
