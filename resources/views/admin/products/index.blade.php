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
                        <form class="d-flex" role="search" method="GET" action="{{ route('admin.brands') }}">
                            <input class="form-control me-2" type="search" name="search" placeholder="Buscar por..." value="{{ request('search') }}" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Procurar</button>
                        </form>
                        <a href="{{ route('admin.brands.create') }}" class="btn btn-outline-primary">Nova Marca</a>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Slug</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <th>{{ $brand->id }}</th>
                                        <td style="width: 60px">
                                            <img style="display: block; width: 100%; height: 100%;" src="{{ asset('storage/' . $brand->image) }}" alt="Marca">
                                        </td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark view-category" data-id="{{ $brand->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></a>

                                            <!-- Botão que chama o modal -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $brand->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                            <!-- Modal de Confirmação -->
                                            <div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $brand->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $brand->id }}">Confirmar Exclusão</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tem certeza que deseja excluir a Marca <strong>{{ $brand->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
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
                                        <td colspan="5">Nenhuma Marca encontrada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $brands->links('pagination.custom') }}
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
                    <h5 class="modal-title" id="viewCategoryModalLabel">Detalhes da Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100">
                    <p><strong>ID:</strong> <span id="brandId"></span></p>
                    <p><strong>Nome:</strong> <span id="brandName"></span></p>
                    <p><strong>Slug:</strong> <span id="brandSlug"></span></p>
                    <p><strong>Data de Criação:</strong> <span id="brandCreatedAt"></span></p>
                    <p><strong>Última Atualização:</strong> <span id="brandUpdatedAt"></span></p>
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
                    const brandId = this.getAttribute('data-id');

                    fetch(`/admin/brands/${brandId}`)
                        .then(response => response.json())
                        .then(brand => {
                            document.getElementById('brandId').textContent = brand.id;
                            document.getElementById('brandName').textContent = brand.name;
                            document.getElementById('brandSlug').textContent = brand.slug;
                            document.getElementById('brandCreatedAt').textContent = new Date(brand.created_at).toLocaleString();
                            document.getElementById('brandUpdatedAt').textContent = new Date(brand.updated_at).toLocaleString();

                            viewModal.show();
                        })
                        .catch(error => console.error('Erro ao buscar dados da marca:', error));
                });
            });
        });
    </script>
@endsection
