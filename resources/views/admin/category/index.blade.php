@extends('admin.master')
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <h2>Categorias</h2>
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
                        <form class="d-flex" role="search" method="GET" action="{{ route('admin.categories') }}">
                            <input class="form-control me-2" type="search" name="search" placeholder="Buscar por..." value="{{ request('search') }}" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Procurar</button>
                        </form>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary">Nova Categoria</a>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Slug</th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <th>{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ Str::limit($category->description, 22, '...') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark view-category" data-id="{{ $category->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></a>

                                            <!-- Botão que chama o modal -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                            <!-- Modal de Confirmação -->
                                            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $category->id }}">Confirmar Exclusão</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tem certeza que deseja excluir a categoria <strong>{{ $category->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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
                                        <td colspan="5">Nenhuma Categoria encontrada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $categories->links('pagination.custom') }}
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
                    <h5 class="modal-title" id="viewCategoryModalLabel">Detalhes da Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100">
                    <p><strong>ID:</strong> <span id="categoryId"></span></p>
                    <p><strong>Nome:</strong> <span id="categoryName"></span></p>
                    <p><strong>Slug:</strong> <span id="categorySlug"></span></p>
                    <p style="text-align: justify"><strong>Descrição:</strong> <div style="overflow: auto;"><span id="categoryDescription"></span></div></p>
                    <p><strong>Data de Criação:</strong> <span id="categoryCreatedAt"></span></p>
                    <p><strong>Última Atualização:</strong> <span id="categoryUpdatedAt"></span></p>
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
                    const categoryId = this.getAttribute('data-id');

                    fetch(`/admin/categories/${categoryId}`)
                        .then(response => response.json())
                        .then(category => {
                            document.getElementById('categoryId').textContent = category.id;
                            document.getElementById('categoryName').textContent = category.name;
                            document.getElementById('categorySlug').textContent = category.slug;
                            document.getElementById('categoryDescription').textContent = category.description;
                            document.getElementById('categoryCreatedAt').textContent = new Date(category.created_at).toLocaleString();
                            document.getElementById('categoryUpdatedAt').textContent = new Date(category.updated_at).toLocaleString();

                            viewModal.show();
                        })
                        .catch(error => console.error('Erro ao buscar dados da categoria:', error));
                });
            });
        });
    </script>
@endsection
