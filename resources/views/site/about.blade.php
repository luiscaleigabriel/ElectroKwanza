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
                        <li><a href="{{ route('home.index') }}"><i class="lni lni-home"></i> Home</a></li>
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
                    <div style="height: 546px;" class="content-left position-relative">
                        <video id="video" style="display: block; object-fit: cover; width: 100%; height: 100%;" src="{{ asset('assets/video.mp4') }}"></video>
                        <a href="#" id="playPauseBtn" class="glightbox video position-absolute top-50 start-50 translate-middle">
                            <i id="playPauseIcon" class="lni lni-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- content-1 start -->
                    <div class="content-right">
                        <h2>ElectroKwanza - O seu parceiro fiável e confiável</h2>
                        <p>Bem-vindo à ElectroKwanza, a sua loja de confiança para produtos eletrónicos de qualidade!
                            Oferecemos uma vasta gama de produtos das melhores marcas, garantindo sempre excelência,
                            inovação e preços competitivos.
                        </p>
                        <p>Na ElectroKwanza, valorizamos a sua satisfação. Por isso, comprometemo-nos a oferecer um
                            atendimento dedicado, entregas rápidas e segurança nas suas compras.</p>
                        <p>💡 ElectroKwanza - Tecnologia ao seu alcance, com confiança e qualidade garantidas!</p>
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
                        <p class="wow fadeInUp" data-wow-delay=".6s">Na ElectroKwanza, acreditamos que o sucesso é
                            construído por pessoas dedicadas e apaixonadas pelo que fazem. A nossa equipa é composta por
                            profissionais experientes e comprometidos em oferecer o melhor atendimento, suporte e soluções
                            personalizadas para cada cliente.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Team -->
                    <div class="single-team">
                        <div class="image">
                            <img src="assets/imagens/sobre/sobre-video-image.png" alt="#">
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
                            <img src="assets/imagens/sobre/pas.jpg" alt="#">
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
                            <img src="assets/imagens/sobre/js.jpg" alt="#">
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
                            <img src="assets/imagens/sobre/cam.jpg" alt="#">
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

@section('js')
    <script>
        const video = document.getElementById('video');
        const playPauseBtn = document.getElementById('playPauseBtn');
        const playPauseIcon = document.getElementById('playPauseIcon');

        playPauseBtn.addEventListener('click', function(e) {
            e.preventDefault();

            if (video.paused) {
                video.play();
                playPauseIcon.classList.remove('lni-play');
                playPauseIcon.classList.add('lni-pause');
            } else {
                video.pause();
                playPauseIcon.classList.remove('lni-pause');
                playPauseIcon.classList.add('lni-play');
            }
        });
    </script>
@endsection
