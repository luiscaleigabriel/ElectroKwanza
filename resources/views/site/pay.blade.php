@extends('site.master')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Pagamento</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('home.loja') }}">Loja</a></li>
                        <li>Checkout</li>
                        <li>Pagamento</li>
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
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                    aria-expanded="false" aria-controls="collapsefive">Pagar com Viza</h6>
                                <section class="checkout-steps-form-content collapse" id="collapsefive"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{ route('pay.visa') }}" method="POST" class="checkout-payment-form">
                                                @csrf
                                                <div class="single-form form-default">
                                                    <label>Nome do titular</label>
                                                    <div class="form-input form">
                                                        <input name="titular-name" type="text" placeholder="Nome do titular">
                                                    </div>
                                                </div>
                                                <div class="single-form form-default">
                                                    <label>Número do cartão</label>
                                                    <div class="form-input form">
                                                        <input name="credit-card-number" id="credit-input" type="text"
                                                            placeholder="0000 0000 0000 0000">
                                                        <img src="{{{ asset('assets/imagens/card.png') }}}" alt="card">
                                                    </div>
                                                </div>
                                                <div class="payment-card-info">
                                                    <div class="single-form form-default mm-yy">
                                                        <label>Expiração</label>
                                                        <div class="expiration d-flex">
                                                            <div class="form-input form">
                                                                <input name="expiration-m" type="text" placeholder="MM">
                                                            </div>
                                                            <div class="form-input form">
                                                                <input name="expiration-y" type="text" placeholder="AAAA">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>CVC/CVV <span><i
                                                                    class="mdi mdi-alert-circle"></i></span></label>
                                                        <div class="form-input form">
                                                            <input name="expiration-cvc-cvv" type="text" placeholder="***">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-form form-default button">
                                                    <button class="btn">Pagar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsesix"
                                    aria-expanded="false" aria-controls="collapsesix">Pagar com Unitel Money</h6>
                                <section class="checkout-steps-form-content collapse" id="collapsesix"
                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <form action="{{ route('pay.unitelmoney') }}" method="post">
                                            @csrf
                                            <div class="col-12">
                                                <div class="checkout-payment-form">
                                                    <!-- Número de Telefone Unitel Money -->
                                                    <div class="single-form form-default">
                                                        <label>Número de Telefone Unitel Money</label>
                                                        <div class="form-input form">
                                                            <input type="text" name="unitel_number"
                                                                   value="{{ old('unitel_number') }}"
                                                                   placeholder="Ex: 923 000 000" class="form-control @error('unitel_number')is-invalid @enderror">
                                                            @error('unitel_number')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- Código PIN (Senha) -->
                                                    <div class="single-form form-default">
                                                        <label>PIN Unitel Money</label>
                                                        <div class="form-input form">
                                                            <input type="password" name="unitel_pin" placeholder="****" class="form-control @error('unitel_pin')is-invalid @enderror">
                                                            @error('unitel_pin')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- Botão de Pagamento -->
                                                    <div class="single-form form-default button">
                                                        <button type="submit" class="btn">Pagar com Unitel Money</button>
                                                    </div>
                                                    @if(session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
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
                            @if(session('ship'))
                                <div class="sub-total-price">
                                    <div class="total-price">
                                        <p class="value">Entrega</p>
                                        <p class="price">{{ number_format(session('ship'), 2, ',', '.') }}Kz</p>
                                    </div>
                                </div>
                            @endif
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total:</p>
                                    <p class="price">{{ number_format($cartTotal + session('ship') ?? 0, 2, ',', '.') }}Kz</p>
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
