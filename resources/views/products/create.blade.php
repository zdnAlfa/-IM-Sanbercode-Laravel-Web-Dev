@extends('layouts.master')

@section('title', 'Tambah Product')

@section('content')
<div class="container mt-4">
    <h1>Tambah Product</h1>
    <a href="{{ route('product.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    @if(session('error'))
        <div class="alert alert-danger mb-4">{{ session('error') }}</div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nama Product <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name') }}" 
                   placeholder="Contoh: Sanberstyle T-Shirt">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" rows="5" 
                      placeholder="Deskripsi product">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" 
                   id="price" name="price" value="{{ old('price') }}" 
                   min="1" placeholder="Harga dalam Rupiah">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                   id="stock" name="stock" value="{{ old('stock') }}" 
                   min="0" placeholder="Jumlah stock">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
            <select class="form-control @error('category_id') is-invalid @enderror" 
                    id="category_id" name="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Product</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                   id="image" name="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">
                Batal
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
