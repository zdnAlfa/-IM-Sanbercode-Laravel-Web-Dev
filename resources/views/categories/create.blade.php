@extends('layouts.master')
@section('title', 'Tambah Category')

@section('content')
    <h1>Tambah Category Baru</h1>
    <a href="{{ route('category.index') }}">← Kembali</a>
    <hr>

    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        
        <label>Nama Category:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>
        
        <label>Description:</label><br>
        <textarea name="description" rows="5" cols="50">{{ old('description') }}</textarea>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>
        
        <input type="submit" value="Simpan">
        <a href="{{ route('category.index') }}">Batal</a>
    </form>
@endsection