@extends('admin.master')
@section('content')
    <!-- Form Start -->

    <div class="container-fluid pt-4 px-4">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-itens-center justify-content-between mb-4">
                        <h6 class="mb-4">Nova Categoria</h6>
                        <a href="{{ route('admin.categories') }}" class="btn btn-outline-dark">Voltar</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            id="floatingInput"
                            value="{{ old('name') }}"
                            placeholder="Nome da Categoria">
                        <label for="floatingInput">Nome</label>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            id="floatingTextarea"
                            style="height: 150px;"
                            placeholder="Descrição da Categoria">{{ old('description') }}</textarea>
                        <label for="floatingTextarea">Descrição</label>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary m-2" type="submit">Salvar</button>
                    {{-- <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                    </div> --}}
                </div>
            </div>
        </form>
    </div>
    <!-- Form End -->
@endsection
