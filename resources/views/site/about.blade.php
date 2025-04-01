@extends('site.master')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Sobre-nós</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li>Sobre</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start About Area -->
<section class="about-us section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div style="height: 546px;" class="content-left">
                    <img style="display: block; object-fit: cover; width: 100%; height: 100%;" src="imagens/sobre-video-image.png" alt="#">
                    <a target="_blank" href="https://youtu.be/lziqXOSNuQE"
                        class="glightbox video"><i class="lni lni-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <!-- content-1 start -->
                <div class="content-right">
                    <h2>ElectroKwanza - O seu parceiro fiável e confiável</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus
                        pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut
                        accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum
                        fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis.
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->

<!-- Start Team Area -->
<section class="team section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Nossa Equipa</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Team -->
                <div class="single-team">
                    <div class="image">
                        <img src="imagens/sobre/sobre-video-image.png" alt="#">
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Luís Gabriel</h3>
                            <h5>Fundador, CEO</h5>
                            <ul class="social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Team -->
                <div class="single-team">
                    <div class="image">
                        <img src="imagens/sobre/pas.jpg" alt="#">
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Pascoal Excelente</h3>
                            <h5>Diretor Financeiro</h5>
                            <ul class="social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Team -->
                <div class="single-team">
                    <div class="image">
                        <img src="imagens/sobre/js.jpg" alt="#">
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>José Henriques</h3>
                            <h5>Diretor de Marketing</h5>
                            <ul class="social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Team -->
                <div class="single-team">
                    <div class="image">
                        <img src="imagens/sobre/cam.jpg" alt="#">
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Osvaldo Niro</h3>
                            <h5>Diretor Administrativo</h5>
                            <ul class="social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
        </div>
    </div>
</section>
<!-- End Team Area -->
@endsection
