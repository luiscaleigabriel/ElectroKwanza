<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ElectroK.</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ Auth::user()->image ?? asset('assets/imagens/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h6>
                <span>{{ Auth::user()->role }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dash') }}" class="nav-item nav-link"><i class="bi bi-grid"></i>Dashboard</a>
            <a href="{{ route('admin.categories') }}" class="nav-item nav-link"><i class="bi bi-stack"></i>Categorias</a>
            <a href="{{ route('admin.subcategories') }}" class="nav-item nav-link"><i class="bi bi-stack"></i>SubCategorias</a>
            <a href="chart.html" class="nav-item nav-link"><i class="bi bi-stack"></i></i>Marcas</a>
            <a href="table.html" class="nav-item nav-link"><i class="bi bi-cart"></i>Produtos</a>
            <a href="chart.html" class="nav-item nav-link"><i class="bi bi-cash-stack"></i>Compras</a>
            <a href="chart.html" class="nav-item nav-link"><i class="bi bi-calendar-check"></i>Entregas</a>
            <a href="chart.html" class="nav-item nav-link"><i class="bi bi-people"></i>Usuários</a>
            <a href="chart.html" class="nav-item nav-link"><i class="bi bi-chat-left"></i>Mensagens</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
