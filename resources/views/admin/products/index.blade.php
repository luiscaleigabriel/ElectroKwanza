@extends('admin.master')
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <h2>Produtos</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form class="d-flex" role="search" method="GET" action="{{ route('admin.products') }}">
                            <input class="form-control me-2" type="search" name="search" placeholder="Buscar por..." value="{{ request('search') }}" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Procurar</button>
                        </form>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary">Novo Produto</a>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Categoria</th>
                                    <th>Ativo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th>{{ $product->id }}</th>
                                        <td style="width: 60px">
                                            <img style="display: block; width: 100%; height: 100%;" src="{{ asset('storage/' . $product->image1) }}" alt="Marca">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->is_active == true ? 'Ativo' : 'Inativo' }} </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark view-category" data-id="{{ $product->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></a>

                                            <!-- Botão que chama o modal -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                            <!-- Modal de Confirmação -->
                                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Confirmar Exclusão</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tem certeza que deseja excluir a Marca <strong>{{ $product->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Sim, Excluir</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Nenhum produto encontrada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $products->links('pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

    <!-- Modal de Visualização de detalhes -->
    <div class="modal fade" id="viewCategoryModal" tabindex="-1" aria-labelledby="viewCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewCategoryModalLabel">Detalhes do Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100">
                    <p><strong>ID:</strong> <span id="productId"></span></p>
                    <p><strong>Nome:</strong> <span id="productName"></span></p>
                    <p><strong>Slug:</strong> <span id="productSlug"></span></p>
                    <p><strong>Preço:</strong> <span id="productPrice"></span></p>
                    <p><strong>Quantidade:</strong> <span id="productStock"></span></p>
                    <p><strong>Categoria:</strong> <span id="productCategory"></span></p>
                    <p><strong>Subcategoria:</strong> <span id="productSubcategory"></span></p>
                    <p><strong>Marca:</strong> <span id="productBrand"></span></p>
                    <p><strong>Descição:</strong> <span id="productDescription"></span></p>
                    <p><strong>Data de Criação:</strong> <span id="productCreatedAt"></span></p>
                    <p><strong>Última Atualização:</strong> <span id="productUpdatedAt"></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewButtons = document.querySelectorAll('.view-category');
            const viewModal = new bootstrap.Modal(document.getElementById('viewCategoryModal'));

            viewButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');

                    fetch(`/admin/products/${productId}`)
                        .then(response => response.json())
                        .then(product => {
                            document.getElementById('productId').textContent = product.id;
                            document.getElementById('productName').textContent = product.name;
                            document.getElementById('productSlug').textContent = product.slug;
                            document.getElementById('productPrice').textContent = product.price;
                            document.getElementById('productStock').textContent = product.stock;
                            document.getElementById('productCategory').textContent = product.category_id;
                            document.getElementById('productSubcategory').textContent = product.subcategory_id;
                            document.getElementById('productBrand').textContent = product.brand_id;
                            document.getElementById('productDescription').textContent = product.description;
                            document.getElementById('productCreatedAt').textContent = new Date(product.created_at).toLocaleString();
                            document.getElementById('productUpdatedAt').textContent = new Date(product.updated_at).toLocaleString();

                            viewModal.show();
                        })
                        .catch(error => console.error('Erro ao buscar dados do produto:', error));
                });
            });
        });
    </script>
@endsection
