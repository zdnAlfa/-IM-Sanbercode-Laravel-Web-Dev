@extends('layouts.master')

@section('title', 'Create Transaction')

@section('content')
<div class="container mt-4">
    <h1>Create Transaction</h1>
    <a href="{{ route('transaction.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select class="form-control" id="product_id" name="product_id" required>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="in">Masuk</option>
                <option value="out">Keluar</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection