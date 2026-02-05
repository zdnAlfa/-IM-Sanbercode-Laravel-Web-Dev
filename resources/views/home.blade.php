@extends('layouts.master')
@section('title', 'Home - Sanberbook')

@section('content')
    
    <h2>Social Media Developer Santai Berkualitas</h2>
    <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
    
    <h3>Benefit Join di SanberBook</h3>
    <ul>
        <li>Mendapat motivasi dari sesama developer</li>
        <li>Sharing knowledge dari para mastah Sanber</li>
        <li>Dibuat oleh calon web developer terbaik</li>
    </ul>
    
    <h3>Cara Bergabung ke SanberBook</h3>
    <ol>
        <li>Mengunjungi Website ini</li>
        <li>Mendaftar di <a href="{{ route('register') }}">Form Sign Up</a></li>
        <li>Selesai</li>
    </ol>
@endsection