@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info">
            <h5 class="alert-heading">Selamat Datang, {{ Auth::check() ? Auth::user()->name : 'Guest' }}!</h5>
            @if(Auth::check())
                <p>Role Anda: <strong>{{ ucfirst(Auth::user()->role) }}</strong></p>
                
                @if(Auth::user()->role === 'admin')
                    <div class="mt-3">
                        <h6>Admin Access:</h6>
                        <ul class="mb-0">
                            <li>✅ CRUD Categories</li>
                            <li>✅ CRUD Products</li>
                            <li>✅ CRUD Transactions</li>
                            <li>✅ Full Access to All Features</li>
                        </ul>
                    </div>
                @elseif(Auth::user()->role === 'staff')
                    <div class="mt-3">
                        <h6>Staff Access:</h6>
                        <ul class="mb-0">
                            <li>✅ View Products</li>
                            <li>✅ View Transactions</li>
                            <li>❌ No CRUD Access</li>
                        </ul>
                    </div>
                @else
                    <div class="mt-3">
                        <h6>User Access:</h6>
                        <ul class="mb-0">
                            <li>✅ View Dashboard</li>
                            <li>❌ Limited Access</li>
                        </ul>
                    </div>
                @endif
            @else
                <p>Silakan <a href="{{ route('login') }}">login</a> untuk melanjutkan.</p>
            @endif
        </div>
    </div>
</div>
@endsection