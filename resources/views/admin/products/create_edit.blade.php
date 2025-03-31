@extends('admin.master')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
            method="POST" class="row g-4" enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT') <!-- Necessário para fazer o update -->
            @endif
            <div class="col">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">{{ isset($product) ? 'Editar Produto' : 'Novo Produto' }}</h6>
                        <a href="{{ route('admin.products') }}" class="btn btn-outline-dark">Voltar</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="floatingInput" placeholder="Nome do produto"
                            value="{{ old('name', isset($product) ? $product->name : '') }}">
                        <label for="floatingInput">Nome</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" id="floatingInput" placeholder="Preço"
                                    value="{{ old('price', isset($product) ? $product->price : '') }}">
                                <label for="floatingInput">Preço</label>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('stock') is-invalid @enderror"
                                    name="stock" id="floatingInput" placeholder="Quantidade em stock"
                                    value="{{ old('stock', isset($product) ? $product->stock : '') }}">
                                <label for="floatingInput">Quantidade em stock</label>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="image1" class="form-control @error('image1') is-invalid @enderror"
                            id="image1" accept="image/*" onchange="previewImage1(event)">
                        <label for="floatingInput">Imagem principal do produto</label>
                        @error('image1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <input type="file" name="image2"
                                    class="form-control @error('image2') is-invalid @enderror" id="image2"
                                    accept="image/*" onchange="previewImage2(event)">
                                <label for="floatingInput">Imagem Secundaria (Opcional)</label>
                                @error('image2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="file" name="image3"
                                    class="form-control @error('image3') is-invalid @enderror" id="image3"
                                    accept="image/*" onchange="previewImage3(event)">
                                <label for="floatingInput">Imagem Terciaria (Opcional)</label>
                                @error('image3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-floating col">
                            <!-- Área onde a pré-visualização será exibida -->
                            <img id="imagePreview1"
                                src="{{ isset($product) ? ($product->image1 ? asset('storage/' . $product->image1) : '#') : '#' }}"
                                alt="Pré-visualização da Imagem"
                                style="max-width: 200px; margin-top: 10px; {{ isset($product) ? ($product->image1 ? '' : 'display: none; : ') : 'display: none;' }}">
                        </div>
                        <div class="form-floating col">
                            <!-- Área onde a pré-visualização será exibida -->
                            <img id="imagePreview2"
                                src="{{ isset($product) ? ($product->image2 ? asset('storage/' . $product->image2) : '#') : '#' }}"
                                alt="Pré-visualização da Imagem"
                                style="max-width: 200px; margin-top: 10px; {{ isset($product) ? ($product->image2 ? '' : 'display: none; : ') : 'display: none;' }}">
                        </div>
                        <div class="form-floating col">
                            <!-- Área onde a pré-visualização será exibida -->
                            <img id="imagePreview3"
                                src="{{ isset($product) ? ($product->image3 ? asset('storage/' . $product->image3) : '#') : '#' }}"
                                alt="Pré-visualização da Imagem"
                                style="max-width: 200px; margin-top: 10px; {{ isset($product) ? ($product->image3 ? '' : 'display: none; : ') : 'display: none;' }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-floating col">
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                aria-label="Default select example">
                                @if (isset($product))
                                    <option disabled>Selecione a categoria</option>
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @else
                                    <option disabled selected>Selecione a categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating col">
                            <select class="form-select @error('category_id') is-invalid @enderror" name="subcategory_id"
                                aria-label="Default select example">
                                @if (isset($product))
                                    <option disabled>Selecione a Subcategoria</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}
                                            value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                @else
                                    <option disabled selected>Selecione a Subcategoria</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('subcategory_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-floating col">
                            <select class="form-select @error('category_id') is-invalid @enderror" name="brand_id"
                                aria-label="Default select example">
                                @if (isset($product))
                                    <option disabled>Selecione a Marca do produto</option>
                                    @foreach ($brands as $brand)
                                        <option {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                            value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                @else
                                    <option disabled selected>Selecione a Marca do produto</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating col">
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active"
                                aria-label="Default select example">
                                @if (isset($product))
                                    <option value="1" {{ $product->is_active == true ? 'selected' : '' }}>Produto
                                        ativo</option>
                                    <option value="0" {{ $product->is_active == false ? 'selected' : '' }}>Produto
                                        inativo</option>
                                @else
                                    <option value="1" selected>Produto ativo</option>
                                    <option value="0">Produto inativo</option>
                                @endif
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            placeholder="Descrição da Categoria" id="floatingTextarea" style="height: 150px;">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                        <label for="floatingTextarea">Descrição do produto</label>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary m-2"
                        type="submit">{{ isset($product) ? 'Atualizar' : 'Salvar' }}</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Form End -->
@endsection
@section('scripts')
    <script>
        function previewImage1(event) {
            const image = document.getElementById('image1').files[0];
            const imagePreview = document.getElementById('imagePreview1');
            if (image) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(image);
            }
        }

        function previewImage2(event) {
            const image = document.getElementById('image2').files[0];
            const imagePreview = document.getElementById('imagePreview2');
            if (image) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(image);
            }
        }

        function previewImage3(event) {
            const image = document.getElementById('image3').files[0];
            const imagePreview = document.getElementById('imagePreview3');
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
