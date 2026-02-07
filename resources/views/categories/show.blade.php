@extends('layouts.master')
@section('title', 'Detail Category')

@section('content')
    <h1>Detail Category</h1>
    <a href="{{ route('category.index') }}">← Kembali ke List</a>
    <hr>

    <p><strong>Nama Category:</strong> {{ $category->name }}</p>
    <p><strong>Description:</strong> {{ $category->description ?? '-' }}</p>
    <p><strong>Created At:</strong> {{ $category->created_at->format('d M Y H:i:s') }}</p>
    <p><strong>Updated At:</strong> {{ $category->updated_at->format('d M Y H:i:s') }}</p>

    <hr>
    <a href="{{ route('category.edit', $category->id) }}">Edit</a> |
    
    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Delete</button>
    </form>
@endsection