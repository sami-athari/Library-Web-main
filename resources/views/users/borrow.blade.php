@extends('layouts.app')

@section('content')
<style>
    /* Dark background */
    body {
        background-color: #2c2c2c;
        color: #ddd;
    }

    /* Navbar styling */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: rgba(17, 17, 17, 0.8); /* Semi-transparent for blur effect */
        backdrop-filter: blur(10px); /* Blur effect */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); /* Shadow effect */
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        border-radius: 0 0 20px 20px; /* Rounded bottom corners */
    }

    /* Navbar links */
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

    /* Navbar title */
    .navbar h2 {
        color: white;
        font-size: 24px;
        margin: 0;
    }

    /* Logout button */
    .logout {
        background-color: #dc3545;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
        color: white;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .logout:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }

    /* Main content area */
    .main-content {
        margin-top: 80px; /* Space for navbar */
        padding: 20px;
        background-color: #2c2c2c;
        color: #ddd;
        width: 100%;
    }

    /* Form styling */
    .form-container {
        background-color: #1f1f1f;
        padding: 30px;
        border-radius: 10px;
        max-width: 600px;
        margin: 60px auto 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .form-container h2 {
        color: #f3f3f3;
        margin-bottom: 20px;
        font-size: 24px;
        border-bottom: 1px solid #444;
        padding-bottom: 5px;
    }

    .form-container label {
        color: #ddd;
        display: block;
        margin-bottom: 8px;
    }

    .form-container input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #444;
        background-color: #333;
        color: #ddd;
        outline: none;
    }

    .form-container input:focus {
        outline: none;
        background-color: #444;
    }

    .form-container button {
        background-color: #1d72b8;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .form-container button:hover {
        background-color: #155a8a;
        transform: scale(1.05);
    }
</style>

<!-- Navbar with title and logout button -->
<div class="navbar">
    <h2>PERPUS</h2>
    <div class="navbar-links">
        <a href="{{ route('users.index') }}">Home</a>
        <a href="{{ route('users.dashboard') }}">Dashboard</a>
        <a href="{{ route('users.cart') }}">Cart</a>
    </div>
    <a href="{{ route('logout') }}" class="logout">Logout</a>
</div>

<!-- Main content area with form -->
<div class="main-content">
    <div class="form-container">
        <h2>Pinjam Buku: {{ $perpus->nama }}</h2>
        <form action="{{ route('users.borrow.store', $perpus->id) }}" method="POST">
            @csrf
            <div>
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" min="1" max="{{ $perpus->stok }}" placeholder="Masukkan jumlah" required>
            </div>
            <button type="submit">Pinjam</button>
        </form>
    </div>
</div>
@endsection
