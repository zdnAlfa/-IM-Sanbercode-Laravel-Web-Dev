@extends('layouts.master')

@section('title', 'Create Profile')

@section('content')
<div class="container mt-4">
    <h1>Create Profile</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('profile.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3">{{ old('bio') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection