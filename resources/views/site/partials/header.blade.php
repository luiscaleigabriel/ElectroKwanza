<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="top-end">
                        @auth
                            <div class="dropdown">
                                <div class="dropdown-toggle d-flex align-items-center text-decoration-none" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                                    <i class="lni lni-user me-1"></i>
                                    <span>Olá, {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</span>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('customer.index') }}"><i class="lni lni-user me-2"></i> Meu
                                            Perfil</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="lni lni-cart me-2"></i> Minhas
                                            Compras</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="lni lni-heart me-2"></i>
                                            Favoritos</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                    <li><a class="dropdown-item" href="{{ route('auth.logout') }}"></i>
                                            Sair</a></li>
                                    <li>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                        @guest
                            <ul class="user-login">
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Registre-se</a>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('assets/imagens/logo.png') }}" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <form role="search" method="GET" action="{{ route('home.loja') }}"
                    class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-input">
                                <input class="form-control me-2" type="search" name="search"
                                    placeholder="Buscar por..." value="{{ request('search') }}" aria-label="Search">
                            </div>
                            <div class="search-btn">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </form>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Apoio ao Cliente:
                                <span>(+244) 929 379 920</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="#">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="{{ route('cart.index') }}" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{ $cartCount }}</span>
                                </a>
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ $cartCount }} Items</span>
                                        <a href="{{ route('cart.index') }}">Ver Carrinho</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @foreach ($cartItems as $item)
                                            <li>
                                                <a href="{{ route('cart.remove', $item->rowId) }}" class="remove"
                                                    title="Remover este item">
                                                    <i class="lni lni-close"></i>
                                                </a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img"
                                                        href="{{ route('product.details', $item->id) }}">
                                                        <img src="{{ asset('storage/' . ($item->options->image ?? 'default.jpg')) }}"
                                                            alt="{{ $item->name }}">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h4><a
                                                            href="{{ route('product.details', $item->id) }}">{{ $item->name }}</a>
                                                    </h4>
                                                    <p class="quantity">{{ $item->qty }}x - <span
                                                            class="amount">{{ number_format($item->price, 2, ',', '.') }}
                                                            Kz</span></p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">{{ number_format($cartTotal, 2, ',', '.') }}
                                                Kz</span>
                                        </div>
                                        <div class="button">
                                            <a href="{{ route('checkout.index') }}"
                                                class="btn animate {{ $cartTotal < 1 ? 'disabled' : '' }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>Todas Categorias</span>
                        <ul class="sub-category">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('home.loja') }}?search={{ $category->name }}">{{ $category->name }}
                                        <i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        @foreach ($subcategories as $subcategory)
                                            @if ($category->id == $subcategory->category_id)
                                                <li><a
                                                        href="{{ route('home.loja') }}?search={{ $subcategory->name }}">{{ $subcategory->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ route('home.index') }}" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.loja', 'hp') }}" aria-label="Toggle navigation">Loja</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.about') }}" aria-label="Toggle navigation">Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.contact') }}"
                                        aria-label="Toggle navigation">Contactos</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">Siga-nos:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>
<!-- End Header Area -->
