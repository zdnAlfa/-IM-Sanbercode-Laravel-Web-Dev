@extends('layouts.master')

@section('title', 'List Transaction')

@section('content')
<div class="container mt-4">
    <h1>List Transaction</h1>
    <a href="{{ route('transaction.create') }}" class="btn btn-primary mb-3">+ Tambah Transaksi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>User</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->product->name }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ ucfirst($transaction->type) }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection