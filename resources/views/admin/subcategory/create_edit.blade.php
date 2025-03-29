@extends('admin.master')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <form
            action="{{ isset($subcategory) ? route('admin.subcategories.update', $subcategory->id) : route('admin.subcategories.store') }}"
            method="POST" class="row g-4">
            @csrf
            @if (isset($subcategory))
                @method('PUT') <!-- Necessário para fazer o update -->
            @endif
            <div class="col">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">{{ isset($subcategory) ? 'Editar Subcategoria' : 'Nova Subcategoria' }}</h6>
                        <a href="{{ route('admin.subcategories') }}" class="btn btn-outline-dark">Voltar</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="floatingInput" placeholder="Nome da Categoria"
                            value="{{ old('name', isset($subcategory) ? $subcategory->name : '') }}">
                        <label for="floatingInput">Nome</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                            aria-label="Default select example">
                            <option disabled selected>Selecione a categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            placeholder="Descrição da Categoria" id="floatingTextarea" style="height: 150px;">{{ old('description', isset($subcategory) ? $subcategory->description : '') }}</textarea>
                        <label for="floatingTextarea">Descrição (Opcional)</label>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary m-2"
                        type="submit">{{ isset($subcategory) ? 'Atualizar' : 'Salvar' }}</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Form End -->
@endsection
