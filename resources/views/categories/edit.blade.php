@extends('layouts.master')
@section('title', 'Edit Category')

@section('content')
    <h1>Edit Category</h1>
    <a href="{{ route('category.index') }}">← Kembali</a>
    <hr>

    <form method="POST" action="{{ route('category.update', $category->id) }}">
        @csrf
        @method('PUT')
        
        <label>Nama Category:</label><br>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>
        
        <label>Description:</label><br>
        <textarea name="description" rows="5" cols="50">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>
        
        <input type="submit" value="Update">
        <a href="{{ route('category.index') }}">Batal</a>
    </form>
@endsection