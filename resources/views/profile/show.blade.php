@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Profile</h1>
        <a href="{{ route('profile.edit') }}" class="btn btn-warning">
            <i class="ti ti-edit"></i> Edit Profile
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('templating/src/assets/images/profile/user-1.jpg') }}" 
                     alt="Profile Picture" 
                     class="rounded-circle" 
                     width="120" 
                     height="120">
                <h3 class="mt-3">{{ Auth::user()->name }}</h3>
                <p class="text-muted">{{ Auth::user()->email }}</p>
                <span class="badge bg-{{ Auth::user()->role === 'admin' ? 'primary' : (Auth::user()->role === 'staff' ? 'success' : 'secondary') }}">
                    {{ ucfirst(Auth::user()->role) }}
                </span>
            </div>

            <hr>

            @if($profile)
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Age:</label>
                        <p class="form-control-plaintext">{{ $profile->age ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Joined:</label>
                        <p class="form-control-plaintext">{{ Auth::user()->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Bio:</label>
                    <div class="form-control-plaintext" style="white-space: pre-line;">
                        {{ $profile->bio ?? 'No bio available.' }}
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    <h5>Profil Belum Lengkap</h5>
                    <p>Kamu belum membuat profil. Silakan lengkapi profil kamu untuk menampilkan informasi pribadi.</p>
                    <a href="{{ route('profile.create') }}" class="btn btn-primary mt-2">
                        <i class="ti ti-plus"></i> Buat Profil Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection