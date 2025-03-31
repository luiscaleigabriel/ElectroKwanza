@extends('admin.master')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <form action="{{ isset($brand) ? route('admin.brands.update', $brand->id) : route('admin.brands.store') }}"
            method="POST" class="row g-4" enctype="multipart/form-data">
            @csrf
            @if (isset($brand))
                @method('PUT') <!-- Necessário para fazer o update -->
            @endif
            <div class="col">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">{{ isset($brand) ? 'Editar Marca' : 'Nova Marca' }}</h6>
                        <a href="{{ route('admin.brands') }}" class="btn btn-outline-dark">Voltar</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="floatingInput" placeholder="Nome da Categoria"
                            value="{{ old('name', isset($brand) ? $brand->name : '') }}">
                        <label for="floatingInput">Nome</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="image" class="form-control @error('name') is-invalid @enderror"
                            id="image" accept="image/*" onchange="previewImage(event)">
                        <label for="floatingInput">Imagem da Marca</label>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <!-- Área onde a pré-visualização será exibida -->
                        <img id="imagePreview" src="{{ $brand->image ? asset('storage/' . $brand->image) : '#' }}"
                            alt="Pré-visualização da Imagem"
                            style="max-width: 200px; margin-top: 10px; {{ $brand->image ? '' : 'display: none;' }}">
                    </div>
                    <button class="btn btn-primary m-2" type="submit">{{ isset($brand) ? 'Atualizar' : 'Salvar' }}</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Form End -->
@endsection
@section('scripts')
    <script>
        function previewImage(event) {
            const image = document.getElementById('image').files[0];
            const imagePreview = document.getElementById('imagePreview');
            if (image) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(image);
            }
        }
    </script>
@endsection
