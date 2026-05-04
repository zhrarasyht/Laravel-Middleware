@extends('layouts.app')

@section('content')
    <h2>Dashboard Admin</h2>
    <p>Halo, {{ auth()->user()->name }} 👋</p>
    <p>Kamu punya akses khusus sebagai <b>Admin</b></p>

    <hr>

    <h4>Info Kamu</h4>
    <p>Nama: {{ auth()->user()->name }}</p>
    <p>Email: {{ auth()->user()->email }}</p>

    <hr>

    <h4>Daftar User</h4>
    @foreach (\App\Models\User::all() as $user)
        <p>{{ $user->name }} - {{ $user->role }}</p>
    @endforeach
@endsection
