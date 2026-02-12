@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-4">
    <h1>Edit Profile</h1>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $profile->age ?? old('age') }}">
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3">{{ $profile->bio ?? old('bio') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection