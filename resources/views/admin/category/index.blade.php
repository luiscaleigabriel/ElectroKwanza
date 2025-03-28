@extends('admin.master')
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <h2>Categorias</h2>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-itens-center justify-content-between mb-4">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar por..." aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Procurar</button>
                        </form>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary">Nova Categoria</a>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-dark"><i class="bi bi-eye"></i></a>
                                            <a href="#" class="btn btn-outline-success"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <a href="#" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <h4 style="color: #535050; margin-bottom: 30px;">Nenhuma Categoria encontrada</h4>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $categories->links() }}
                            {{-- <div class="btn-group me-2" role="group" aria-label="Second group">
                                <button type="button" class="btn btn-secondary">5</button>
                                <button type="button" class="btn btn-secondary">6</button>
                                <button type="button" class="btn btn-secondary">7</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection
