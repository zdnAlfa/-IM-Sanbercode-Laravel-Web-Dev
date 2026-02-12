@extends('layouts.master')
@section('title', 'Tampil Category')

@section('content')
    <div class="container-fluid">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert" style="background-color: #e6f7e6; border: 1px solid #c3e6cb; color: #155724;">
                {{ session('success') }}
            </div>
        @endif

        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff; color: white; padding: 8px 16px;">
                Tambah
            </a>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 85%;">Name</th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div style="display: flex; flex-direction: row; gap: 5px; align-items: center;">
                            <a href="{{ route('category.show', $category->id) }}" class="btn" style="background-color: #6c5dd3; color: white; border: none; padding: 5px 10px; text-decoration: none; border-radius: 4px;">Detail</a>
                            
                            @if(Auth::check() && Auth::user()->role === 'admin')
                                <a href="{{ route('category.edit', $category->id) }}" class="btn" style="background-color: #00bfa5; color: white; border: none; padding: 5px 10px; text-decoration: none; border-radius: 4px;">Edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background-color: #ff4444; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;" onclick="return confirm('Yakin ingin hapus?')">Delete</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection