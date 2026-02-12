@extends('layouts.master')

@section('title', 'Detail Category')

@section('content')
<div class="container mt-4">
    <h1>Detail Category: {{ $category->name }}</h1>
    <a href="{{ route('category.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">{{ $category->description }}</p>
            
            <h4 class="mt-4">Products in this Category:</h4>
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
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection