@extends('site.master')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Carrinho</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('home.loja') }}">Loja</a></li>
                        <li>Carrinho</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Nome do Produto</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantidade</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Preço</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>SubTotal</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remover</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                @foreach ($cartItems as $item)
                    <!-- Cart Single List list -->
                    <div class="cart-single-list mb-3 p-3 border rounded">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="product-details.html">
                                    <img src="{{ asset('storage/' . $item->options->image) }}" alt="{{ $item->name }}"
                                        class="img-fluid rounded">
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12">
                                <h5 class="product-name"><a
                                        href="{{ route('product.details', $item->id) }}">{{ $item->name }}</a></h5>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="input-group mb-3">
                                    <form action="{{ route('cart.decrease', $item->rowId) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm">-</button>
                                    </form>

                                    <input type="text" class="form-control text-center" value="{{ $item->qty }}"
                                        readonly>

                                    <form action="{{ route('cart.increase', $item->rowId) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button class="btn btn-outline-success btn-sm">+</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ number_format($item->price, 2, ',', '.') }}Kz</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ number_format($item->price * $item->qty, 2, ',', '.') }}Kz</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item" title="Remover este item"
                                    href="{{ route('cart.remove', $item->rowId) }}">
                                    <i class="lni lni-close text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (count($cartItems) < 1)
                    <p style="padding: 40px; font-size: 1.1rem;">Nenhum produto adicionado ao carrinho</p>
                @endif

            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>SubTotal<span>{{ number_format($cartTotal, 2, ',', '.') }}Kz</span></li>
                                        <li>Entrega<span>{{ $cartTotal > 0 ? $cartTotal > 100000 ? 'Gratis' : '3.000,00Kz' : '0,00Kz' }}</span></li>
                                        <li class="last">Total<span>{{ $cartTotal > 0 ? $cartTotal > 100000 ? number_format($cartTotal, 2, ',', '.') : number_format($cartTotal + 3000, 2, ',', '.') : '0,00' }}Kz</span></li>
                                    </ul>
                                    <div class="button">
                                        <a  href="{{ route('checkout.index') }}" class="btn {{ $cartTotal < 1 ? 'disabled' : '' }}">Checkout</a>
                                        <a href="{{ route('home.loja') }}" class="btn btn-alt">Continuar na Loja</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection
