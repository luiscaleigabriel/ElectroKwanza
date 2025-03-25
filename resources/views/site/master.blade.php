<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="Ekwanza lojá especializada no comercio de produtos electrónicos" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ElectoKwanza</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body>

    @include('site.partials.header')

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider" style="background-image: url(imagens/hero/slider-bg1.jpg);">
                                <div class="content">
                                    <h2><span>Aproveite a promoção</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Apenas hoje</span> 30.000,00Kz</h3>
                                    <div class="button">
                                        <a href="#" class="btn">Comprar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider" style="background-image: url(imagens/hero/slider-bg2.jpg);">
                                <div class="content">
                                    <h2><span>Grande promoção</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Apenas hoje</span> 30.000,00Kz</h3>
                                    <div class="button">
                                        <a href="#" class="btn">Comprar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('imagens/hero/slider-bnr.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>Novos produtos</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>1.000.000,00Kz</h3>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Ofertas da semana!</h2>
                                    <p>Compre com 30% de desconto em todos os produtos.</p>
                                    <div class="button">
                                        <a class="btn" href="#">Comprar agora</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->


    <!-- Start Featured Categories Area -->
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Principais Categorias</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">TV & Audio</h3>
                        <ul>
                            <li><a href="#">TV Smart</a></li>
                            <li><a href="#">QLED TV</a></li>
                            <li><a href="#">Audios</a></li>
                            <li><a href="#">Escutadores</a></li>
                            <li><a href="#">Ver Tudo</a></li>
                        </ul>
                        <div class="images">
                            <img src="imagens/categories/fetured-item-1.png" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Desktop & Laptop</h3>
                        <ul>
                            <li><a href="#">TV Smart</a></li>
                            <li><a href="#">QLED TV</a></li>
                            <li><a href="#">Audios</a></li>
                            <li><a href="#">Escutadores</a></li>
                            <li><a href="#">Ver Tudo</a></li>
                        </ul>
                        <div class="images">
                            <img src="imagens/categories/fetured-item-2.png" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Cctv Camera</h3>
                        <ul>
                            <li><a href="#">TV Smart</a></li>
                            <li><a href="#">QLED TV</a></li>
                            <li><a href="#">Audios</a></li>
                            <li><a href="#">Escutadores</a></li>
                            <li><a href="#">Ver Tudo</a></li>
                        </ul>
                        <div class="images">
                            <img src="imagens/categories/fetured-item-3.png" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Dslr Camera</h3>
                        <ul>
                            <li><a href="#">TV Smart</a></li>
                            <li><a href="#">QLED TV</a></li>
                            <li><a href="#">Audios</a></li>
                            <li><a href="#">Escutadores</a></li>
                            <li><a href="#">Ver Tudo</a></li>
                        </ul>
                        <div class="images">
                            <img src="imagens/categories/fetured-item-4.png" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Smart Phones</h3>
                        <ul>
                            <li><a href="#">TV Smart</a></li>
                            <li><a href="#">QLED TV</a></li>
                            <li><a href="#">Audios</a></li>
                            <li><a href="#">Escutadores</a></li>
                            <li><a href="#">Ver Tudo</a></li>
                        </ul>
                        <div class="images">
                            <img src="imagens/categories/fetured-item-5.png" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Game & Consola</h3>
                        <ul>
                            <li><a href="#">TV Smart</a></li>
                            <li><a href="#">QLED TV</a></li>
                            <li><a href="#">Audios</a></li>
                            <li><a href="#">Escutadores</a></li>
                            <li><a href="#">Ver Tudo</a></li>
                        </ul>
                        <div class="images">
                            <img src="imagens/categories/fetured-item-6.png" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Produtos em Destaque</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="imagens/products/product-1.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="#">Xiaomi Mi Band 5</a>
                            </h4>
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>1.000.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                <span class="discount-price">900.000,00Kz</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('imagens/banner/banner-1-bg.jpg');">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                            <div class="button">
                                <a href="#" class="btn">Ver Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                        style="background-image:url('imagens/banner/banner-2-bg.jpg');">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="button">
                                <a href="#" class="btn">Comprar Agora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Special Offer -->
    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Oferta Especial</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="imagens/products/product-3.jpg" alt="#">
                                    <span class="sale-tag">-25%</span>
                                </div>
                                <div class="product-info">
                                    <span class="category">Camera</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">WiFi Security Camera</a>
                                    </h4>
                                    <div class="price d-flex align-items-center justify-content-between">
                                        <span>1.000.000,00Kz</span>
                                        <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 68 64">
                                                <path
                                                    d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                        <span class="discount-price">900.000,00Kz</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="imagens/products/product-3.jpg" alt="#">
                                    <span class="sale-tag">-25%</span>
                                </div>
                                <div class="product-info">
                                    <span class="category">Camera</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">WiFi Security Camera</a>
                                    </h4>
                                    <div class="price d-flex align-items-center justify-content-between">
                                        <span>1.000.000,00Kz</span>
                                        <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 68 64">
                                                <path
                                                    d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                        <span class="discount-price">900.000,00Kz</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="imagens/products/product-3.jpg" alt="#">
                                    <span class="sale-tag">-25%</span>
                                </div>
                                <div class="product-info">
                                    <span class="category">Camera</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">WiFi Security Camera</a>
                                    </h4>
                                    <div class="price d-flex align-items-center justify-content-between">
                                        <span>1.000.000,00Kz</span>
                                        <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 68 64">
                                                <path
                                                    d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div style="margin-top: -10px; margin-left: -8px;" class="price"> 
                                        <span class="discount-price">900.000,00Kz</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    </div>
                    <!-- Start Banner -->
                    <div class="single-banner right"
                        style="background-image:url('imagens/banner/banner-3-bg.jpg');margin-top: 30px;">
                        <div class="content">
                            <h2>Samsung Notebook 9 </h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="price">
                                <span>1.000.000,00Kz</span>
                            </div>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Comprar Agora</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner -->
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="offer-content">
                        <div class="image">
                            <img src="imagens/offer-image.jpg" alt="#">
                            <span class="sale-tag">-50%</span>
                        </div>
                        <div class="text">
                            <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                            
                            <div class="price d-flex align-items-center justify-content-between">
                                <span>30.000,00Kz</span>
                                <a href="#" title="Add ao Carrinho" id="btn-add-to-cart">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 68 64">
                                        <path
                                            d="M2.24 0.576c3.52-0.704 7.168 0.192 10.24 1.792 2.624 1.344 4.224 4.096 5.056 6.848 0.96 3.008 1.344 6.144 1.92 9.216 0.96 5.056 2.304 10.048 3.072 15.104 0.384 2.048 0.704 4.224 2.112 5.888 1.408 1.6 3.776 1.664 5.824 1.728 5.376 0 10.816-0.256 16.192 0.128 1.344 0.064 2.88 0 3.648-1.344 3.52-5.312 6.464-11.008 9.28-16.768 0.576-1.152 1.28-2.368 2.56-2.816 1.344-0.448 3.008-0.256 4.032 0.768 1.152 1.28 1.344 3.2 0.704 4.736-2.688 5.376-5.184 10.816-8.512 15.872-1.472 2.176-3.008 4.544-5.184 6.144-1.792 1.28-4.096 0.832-6.144 0.768-6.272-0.064-12.544 0.384-18.752 0-4.16-0.32-8.256-2.368-10.624-5.888-1.728-2.752-2.368-6.080-3.008-9.216-1.28-6.784-2.624-13.504-3.904-20.288-0.384-1.6-0.896-3.392-2.304-4.352-2.24-1.6-5.376-0.256-7.552-1.984-1.344-0.96-0.704-2.688-0.832-4.096-0.128-1.216 1.152-1.984 2.176-2.24zM34.432 4.928c-0.064-1.216 1.408-1.536 2.368-1.792 2.048-0.32 4.608-0.384 6.208 1.152 0.448 3.776 0.64 7.616 0.768 11.392 1.92 0.128 3.84-0.256 5.76-0.064 0.704 0.064 1.536 0.512 1.472 1.344-0.32 1.472-1.472 2.56-2.368 3.712-2.688 3.456-5.76 6.528-8.832 9.536-0.448 0.448-1.024 0.704-1.6 0.448-1.216-0.512-1.984-1.728-2.88-2.688-2.112-2.304-4.224-4.544-6.144-6.912-0.96-1.216-2.176-2.24-2.624-3.712-0.256-0.832 0.512-1.6 1.344-1.664 1.92-0.256 3.84 0.128 5.76 0 0.256-3.584 0.384-7.168 0.768-10.752zM25.28 51.584c2.432-0.704 5.184 0 6.784 1.856 2.368 2.624 1.984 7.232-0.96 9.216-3.136 2.304-8.448 1.216-9.92-2.56-1.664-3.328 0.64-7.616 4.096-8.512zM45.376 53.504c2.432-2.88 7.36-2.944 9.856-0.128 2.112 2.304 2.048 6.208-0.064 8.512-1.216 1.28-2.944 2.048-4.672 2.112h-0.128c-1.856-0.064-3.776-0.832-4.928-2.24-2.048-2.304-2.112-6.016-0.064-8.256z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="price">
                                <span style="margin-left: 0px;" class="discount-price">60.000,00Kz</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt ut
                                eiusmod tempor labores.</p>
                        </div>
                        <div class="box-head">
                            <div class="box">
                                <h1 id="days">00</h1>
                                <h2 id="daystxt">Dias</h2>
                            </div>
                            <div class="box">
                                <h1 id="hours">00</h1>
                                <h2 id="hourstxt">Horas</h2>
                            </div>
                            <div class="box">
                                <h1 id="minutes">00</h1>
                                <h2 id="minutestxt">Minutos</h2>
                            </div>
                            <div class="box">
                                <h1 id="seconds">00</h1>
                                <h2 id="secondstxt">Segundos</h2>
                            </div>
                        </div>
                        <div style="background: rgb(204, 24, 24);" class="alert">
                            <h1 style="padding: 50px 80px;color: white;">Terminou o tempo do desconto! </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Special Offer -->

    <!-- Start Home Product List -->
    <section class="home-product-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">Mais vendidos</h4>
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-1.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">GoPro Hero4 Silver</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-1.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">GoPro Hero4 Silver</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-1.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">GoPro Hero4 Silver</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">Novas chegadas</h4>
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-2.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-2.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-2.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <h4 class="list-title">Diversos</h4>
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-3.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-3.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="imagens/products/product-3.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="#">Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>1.000.000,00Kz</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Home Product List -->

    <!-- Start Brands Area -->
    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">Marcas Popular</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                    <div class="brand-logo">
                        <img src="imagens/brands/01.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="imagens/brands/02.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="imagens/brands/03.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="imagens/brands/04.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="imagens/brands/05.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="imagens/brands/06.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="imagens/brands/02.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="imagens/brands/04.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brands Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Entrega Grátis</h5>
                        <span>Em encomendas de até 100.000,00Kz</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Suporte</h5>
                        <span>Entre em contacto connosco</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Pagamento on-line</h5>
                        <span>Serviços de pagamento seguros</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Devolução fácil</h5>
                        <span>Compras sem complicações</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->

    @include('site.partials.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/glibox.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('js')
</body>

</html>