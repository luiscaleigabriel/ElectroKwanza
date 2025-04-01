<!-- Start Footer Area -->
<footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/imagens/logo.png') }}" alt="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="footer-newsletter">
                            <h4 class="title">
                                Subscreva a nossa Newsletter
                                <span>Obtenha todas as últimas informações, vendas e ofertas.</span>
                            </h4>
                            <div class="newsletter-form-head">
                                <form class="newsletter-form">
                                    <input name="EMAIL" placeholder="Digite seu email aqui..." type="email">
                                    <div class="button">
                                        <button type="button" class="btn">Subscrever<span class="dir-part"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <!-- Start Footer Middle -->
    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>Entre em contacto connosco</h3>
                            <p class="phone">Tel: 929 379 920</p>
                            <ul>
                                <li><span>Sengunda-Sexta: </span> 8h - 21h</li>
                                <li><span>Sábado: </span> 8h - 18h</li>
                            </ul>
                            <p class="mail">
                                <a href="electrokwanza@gmail.com">electrokwanza@gmail.com</a>
                            </p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Informações</h3>
                            <ul>
                                <li><a href="{{ route('home.about') }}">Sobre</a></li>
                                <li><a href="{{ route('home.contact') }}">Contactos</a></li>
                                <li><a href="{{ route('home.contact') }}">Localização</a></li>
                                <li><a href="{{ route('home.about') }}">Puliticas & Privacidade</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Categorias</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('home.loja') }}?search={{$category->slug}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Outros</h3>
                            <ul>
                                <li><a href="{{ route('home.loja') }}?search=electrodomesticos">Electrodomesticos</a></li>
                                <li><a href="{{ route('home.loja') }}?search=Computadores">Computadores</a></li>
                                <li><a href="{{ route('home.loja') }}?search=Acessorios">Acessorios</a></li>
                                <li><a href="{{ route('home.loja') }}?search=a">Diversos</a></li>
                                <li><a href="{{ route('home.loja') }}?search=Hp">Todos</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-12">
                        <div class="payment-gateway">
                            <span>Nós aceitamos:</span>
                            <img src="assets/imagens/credit-cards-footer.png" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="copyright">
                            <p>Desenvolvido por <a href="#">Luís S. Calei Gabriel</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <ul class="socila">
                            <li>
                                <span>Siga-nos:</span>
                            </li>
                            <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni lni-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!--/ End Footer Area -->
