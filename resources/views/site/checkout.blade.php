@extends('site.master')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('home.loja') }}">Loja</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">Detalhes Da Compra</h6>
                                    <form action="{{ route('checkout.initiate') }}" method="POST">
                                        @csrf
                                        <section class="checkout-steps-form-content collapse" id="collapseFour"
                                                 aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>Nome do Usuário</label>
                                                        <div class="row">
                                                            <div class="col-md-6 form-input form">
                                                                <input type="text" name="firstname" placeholder="Primeiro Nome"
                                                                       value="{{ Auth::user()->firstname }}" required>
                                                            </div>
                                                            <div class="col-md-6 form-input form">
                                                                <input type="text" value="{{ Auth::user()->lastname }}"
                                                                       name="lastname" placeholder="Último Nome" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Email</label>
                                                        <div class="form-input form">
                                                            <input type="email" value="{{ Auth::user()->email }}"
                                                                   name="email" placeholder="Seu email" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Nº de Telefone</label>
                                                        <div class="form-input form">
                                                            <input type="text" value="{{ Auth::user()->phone }}"
                                                                   name="phone" placeholder="Seu nº de telefone" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="checkout-payment-option">
                                                        <h6 class="heading-6 font-weight-400 payment-title">Opções de entrega</h6>
                                                        <div class="payment-option-wrapper">
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping_option" value="normal" checked id="shipping-1">
                                                                <label for="shipping-1">
                                                                    <img src="{{ asset('assets/imagens/shipping/shipping-1.png') }}" alt="Sipping">
                                                                    <p>Entrega Normal (Em até 3 dias)</p>
                                                                    <span class="price">2.500,00Kz</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping_option" value="express" id="shipping-2">
                                                                <label for="shipping-2">
                                                                    <img src="{{ asset('assets/imagens/shipping/shipping-2.png') }}" alt="Sipping">
                                                                    <p>Entrega rápida (Em até 24h)</p>
                                                                    <span class="price">6.000,00Kz</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping_option" value="pickup" id="shipping-3">
                                                                <label for="shipping-3">
                                                                    <img src="{{ asset('assets/imagens/shipping/shipping-3.png') }}" alt="Sipping">
                                                                    <p>Sem entrega (Pegue seu produto na loja mais próxima de si)</p>
                                                                    <span class="price">0,00Kz</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="steps-form-btn button">
                                                        <button class="btn" type="submit">Salvar & Continuar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Tabela de Preços</h5>
                            @foreach ($cartItems as $item)
                                <div class="sub-total-price">
                                    <div class="total-price">
                                        <p class="value">{{$item->name}}</p>
                                        <p class="price">{{$item->qty}} x {{ number_format($item->price, 2, ',', '.') }}Kz</p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total:</p>
                                    <p class="price">{{ number_format($cartTotal, 2, ',', '.') }}Kz</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->
@endsection
