@extends('layouts.master')

@section('title', 'List Product')

@section('content')
<style>
    .btn-action {
        min-width: 90px;
        padding: 5px 15px;
    }
</style>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>List Product</h1>
        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('product.create') }}" class="btn btn-primary">
                + Tambah Product
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/300x200' }}" 
                     class="card-img-top" 
                     alt="{{ $product->name }}" 
                     style="height: 200px; object-fit: cover;">
                
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="card-text">Stock: {{ $product->stock }}</p>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                    
                    <div class="d-flex justify-content-between">
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm btn-action">
                                Edit
                            </a>
                        @endif
                        
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-sm btn-action">
                            Read More
                        </a>
                        
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" id="delete-form-{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-action" onclick="confirmDelete({{ $product->id }})">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($products->count() == 0)
        <div class="alert alert-info text-center">
            Belum ada produk. Klik tombol "Tambah Product" untuk menambahkan produk baru.
        </div>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(productId) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + productId).submit();
        }
    });
}
</script>
@endsection