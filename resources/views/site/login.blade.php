@extends('site.master')

@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Login</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Account Login Area -->
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <form class="card login-form" action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="title">
                            <h3>Entrar Agora</h3>
                            <p>Pode fazer login usando a sua conta do facebook ou endereço de e-mail.</p>
                        </div>
                        {{-- <div class="social-login">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn"
                                        href="#"><i class="lni lni-facebook-filled"></i> Facebook
                                    </a></div>
                                <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn"
                                        href="#"><i class="lni lni-google"></i> Google</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="alt-option">
                            <span>Ou</span>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group input-group">
                            <label for="reg-fn">Email</label>
                            <input class="form-control" type="email" name="email" id="reg-email">
                        </div>
                        <div class="form-group input-group">
                            <label for="reg-fn">Senha</label>
                            <input class="form-control" type="password" name="password" id="reg-pass">
                        </div>
                        <div class="d-flex flex-wrap justify-content-between bottom-content">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                <label class="form-check-label">Me lembrar</label>
                            </div>
                            <a class="lost-pass" href="account-password-recovery.html">Recuperar senha?</a>
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">Entrar</button>
                        </div>
                        <p class="outer-link">Não tem uma conta? <a href="register.html">Registre-se Aqui </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Account Login Area -->
@endsection
