<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="utf-8">
    <title>ElectroKwanza</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Sistema de gestão e vendas online" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/imagens/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/dash/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dash/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/dash/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/dash/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Carregando...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- 404 Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                <div class="col-md-6 text-center p-4">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1 fw-bold">404</h1>
                    <h1 class="mb-4">Página não encontrada</h1>
                    <p class="mb-4">Lamentamos, a página que procura não existe no nosso site!</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ url()->previous() }}">Voltar</a>
                </div>
            </div>
        </div>
        <!-- 404 End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/dash/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/dash/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/dash/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/dash/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/dash/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/dash/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/dash/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/dash/js/main.js') }}"></script>
</body>

</html>
