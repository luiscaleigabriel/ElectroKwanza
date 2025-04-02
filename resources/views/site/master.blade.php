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
    <style>
        .floating-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1055;
            width: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeOut 10s forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            80% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* Garante que todo o container do dropdown-toggle seja clicável */
        .dropdown-toggle {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dropdown-toggle:hover {
            color: #0d6efd;
            background-color: #f8f9fa;
        }

        /* Estilo para o texto do usuário */
        .dropdown-toggle span {
            margin-left: 0.5rem;
        }
    </style>
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

    @yield('content')

    @include('site.partials.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>


    <!-- Mensagem de Sucesso -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show floating-alert" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Mensagem de Erro -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show floating-alert" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/glibox.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa todos os dropdowns
            var dropdowns = document.querySelectorAll('.dropdown-toggle');
            dropdowns.forEach(function(dropdown) {
                dropdown.addEventListener('click', function(e) {
                    e.preventDefault();
                    var menu = this.nextElementSibling;
                    menu.classList.toggle('show');

                    // Fecha outros dropdowns abertos
                    document.querySelectorAll('.dropdown-menu').forEach(function(otherMenu) {
                        if (otherMenu !== menu && otherMenu.classList.contains('show')) {
                            otherMenu.classList.remove('show');
                        }
                    });
                });
            });

            // Fecha o dropdown ao clicar fora
            document.addEventListener('click', function(e) {
                if (!e.target.matches('.dropdown-toggle') && !e.target.closest('.dropdown-menu')) {
                    document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                        menu.classList.remove('show');
                    });
                }
            });
        });
    </script>
    @yield('js')
</body>

</html>
