@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <h1>Selamat Datang {{ $userData['first_name'] }} {{ $userData['last_name'] }}</h1>
    <h2>Terima kasih telah bergabung di Sanberbook. Social Media kita bersama!</h2>

    @endsection
