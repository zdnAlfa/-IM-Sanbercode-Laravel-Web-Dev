@extends('layouts.master')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container mt-4">
    <h1>Detail Transaksi</h1>
    <a href="{{ route('transaction.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Product:</label>
                <p class="form-control-plaintext">{{ $transaction->product->name }}</p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">User:</label>
                <p class="form-control-plaintext">{{ $transaction->user->name }}</p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Type:</label>
                <p class="form-control-plaintext">{{ ucfirst($transaction->type) }}</p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Amount:</label>
                <p class="form-control-plaintext">{{ $transaction->amount }}</p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Notes:</label>
                <p class="form-control-plaintext">{{ $transaction->notes ?? '-' }}</p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Date:</label>
                <p class="form-control-plaintext">{{ $transaction->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection