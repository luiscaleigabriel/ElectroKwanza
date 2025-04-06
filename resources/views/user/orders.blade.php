@extends('site.master')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Minhas Compras</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Compras</li>
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
                        <div style="overflow-x: scroll; min-width: 900px;" class="col-lg-12">
                            <div class="cart-list-head">
                                <!-- Cart List Title -->
                                <div class="cart-list-title">
                                    <div class="row">
                                        <div class="col-2">
                                            <p>Código da Compra</p>
                                        </div>
                                        <div class="col-2">
                                            <p>Total</p>
                                        </div>
                                        <div class="col-2">
                                            <p>Status da Compra</p>
                                        </div>
                                        <div class="col-2">
                                            <p>Entrega</p>
                                        </div>
                                        <div class="col-2">
                                            <p>Status da Entrega</p>
                                        </div>
                                        <div class="col-2">
                                            <p>Recibo (PDF)</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Cart List Title -->
                                @foreach ($orders as $order)
                                    <!-- Cart Single List list -->
                                    <div class="cart-single-list mb-3 p-3 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col-2">
                                                {{ Str::limit(Hash::make($order->id), 8, '') }}
                                            </div>
                                            <div class="col-2">
                                                <h6 class="product-name">
                                                    {{ number_format($order->total_price, 2, ',', '.') }}Kz
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-success btn-sm "
                                                    disabled>{{ $order->status }}</button>
                                            </div>
                                            <div class="col-2">
                                                <h6 class="product-name">
                                                    {{ number_format($order->ship, 2, ',', '.') }}Kz
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                @if ($order->total_price > 100000)
                                                    @if ($order->status_ship == true)
                                                        <button type="button" class="btn btn-success btn-sm "
                                                            disabled>Finalizada</button>
                                                    @else
                                                        <button type="button" class="btn btn-secondary btn-sm " disabled>Em
                                                            processo...</button>
                                                    @endif
                                                @else
                                                    @if ($order->ship > 0)
                                                        @if ($order->status_ship == true)
                                                            <button type="button" class="btn btn-success btn-sm "
                                                                disabled>Finalizada</button>
                                                        @else
                                                            <button type="button" class="btn btn-secondary btn-sm "
                                                                disabled>Em
                                                                processo...</button>
                                                        @endif
                                                    @elseif ($order->ship == 1)
                                                        <button title="Vá pegar os seus produtos em uma lojá mais proxima de si. Obrigado por nos escolher, volte sempre!" type="button" class="btn btn-warning btn-sm " disabled>Não
                                                            Pago</button>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="col-2">
                                                <a href="{{ route('payments.pdf', $order->id) }}"
                                                    class="btn btn-primary">Gerar Recibo</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @if (count($orders) < 1)
                                    <p style="padding: 40px; font-size: 1.1rem;">Nenhuma compra realizada no momento!</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->
@endsection
