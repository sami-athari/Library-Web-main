@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #2c2c2c;
    }

    /* Navbar styling */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: rgba(17, 17, 17, 0.8);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        border-radius: 0 0 20px 20px;
    }

    .navbar a {
        color: #aaa;
        padding: 10px 15px;
        text-decoration: none;
        transition: color 0.3s ease, background-color 0.3s ease;
        border-radius: 5px;
    }

    .navbar a:hover {
        background-color: #333;
        color: #fff;
    }

    .navbar h2 {
        color: #fff;
        font-size: 20px;
        margin: 0;
    }

    .logout {
        background-color: #dc3545;
        border: none;
        padding: 10px 15px;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .logout:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }

    .home-content {
        margin-top: 80px;
        padding: 20px;
        background-color: #2c2c2c;
        color: #ddd;
        text-align: center;
    }

    .welcome-message {
        color: #fff;
        margin-bottom: 30px;
    }

    .welcome-message h1 {
        font-size: 32px;
        margin: 0;
        color: #1d72b8;
    }

    .welcome-message p {
        font-size: 18px;
        color: #ccc;
        margin-top: 10px;
    }
</style>

<div class="navbar">
    <h2>PERPUS</h2>
    <div class="navbar-links">
        <a href="{{ route('users.index') }}">Home</a>
        <a href="{{ route('users.dashboard') }}">Dashboard</a>
        <a href="{{ route('users.cart') }}">Cart</a>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">Logout</button>
    </form>
</div>

<div class="home-content">
    <div class="welcome-message">
        <h1>Selamat datang di Perpus</h1>
        <p>Temukan banyak koleksi buku untuk dibaca dan dipinjam sesuai keinginan Anda.</p>
    </div>
</div>
@endsection
