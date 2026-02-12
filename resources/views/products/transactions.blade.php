@extends('layouts.master')

@section('title', 'Product Transactions')

@section('content')
<div class="container mt-4">
    <h1>Transactions for {{ $product->name }}</h1>
    
    <a href="{{ route('product.index') }}" class="btn btn-secondary mb-3">
        ← Back to Products
    </a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->user->name ?? 'N/A' }}</td>
                <td>{{ ucfirst($transaction->type) }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection