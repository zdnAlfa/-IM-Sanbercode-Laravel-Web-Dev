@extends('layouts.master')

@section('title', 'Detail Product')

@section('content')
<div class="container mt-4">
    <h1>Detail Product</h1>
    <!-- Tambahkan bagian ini di bawah judul -->
    <h5 class="card-title">Category: {{ $product->category->name ?? 'N/A' }}</h5>
    <a href="{{ route('product.index') }}" class="btn btn-secondary mb-3">
        ← Kembali ke List
    </a>

    <div class="card">
        <div class="card-body">
            @if($product->image)
                <img src="{{ asset($product->image) }}" 
                     class="img-fluid mb-3" 
                     alt="{{ $product->name }}">
            @endif

            <h3 class="card-title">{{ $product->name }}</h3>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Harga:</label>
                <p class="form-control-plaintext">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Stock:</label>
                <p class="form-control-plaintext">{{ $product->stock }} pcs</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description:</label>
                <p class="form-control-plaintext">{{ $product->description }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Kategori:</label>
                <p class="form-control-plaintext">{{ $product->category?->name ?? '-' }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Created At:</label>
                <p class="form-control-plaintext">{{ $product->created_at->format('d M Y H:i:s') }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Updated At:</label>
                <p class="form-control-plaintext">{{ $product->updated_at->format('d M Y H:i:s') }}</p>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">
                        Edit
                    </a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Delete
                        </button>
                    </form>
                @endif
                
                <a href="{{ route('product.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection