@extends('admin.master')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <form
            action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"
            method="POST" class="row g-4">
            @csrf
            @if (isset($category))
                @method('PUT') <!-- Necessário para fazer o update -->
            @endif
            <div class="col">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">{{ isset($category) ? 'Editar Categoria' : 'Nova Categoria' }}</h6>
                        <a href="{{ route('admin.categories') }}" class="btn btn-outline-dark">Voltar</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="floatingInput" placeholder="Nome da Categoria"
                            value="{{ old('name', isset($category) ? $category->name : '') }}">
                        <label for="floatingInput">Nome</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            placeholder="Descrição da Categoria" id="floatingTextarea" style="height: 150px;">{{ old('description', isset($category) ? $category->description : '') }}</textarea>
                        <label for="floatingTextarea">Descrição</label>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary m-2"
                        type="submit">{{ isset($category) ? 'Atualizar' : 'Salvar' }}</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Form End -->
@endsection
