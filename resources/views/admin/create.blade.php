@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #2b2b2b;
        color: #fff;
    }

    /* Sidebar styles */
    .sidebar {
        width: 200px;
        height: 100vh;
        background-color: #000;
        position: fixed;
        top: 0;
        left: 0;
        padding-top: 20px;
    }

    .sidebar h2 {
        color: #fff;
        text-align: center;
        margin-bottom: 30px;
        font-size: 20px;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 20px 0;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        display: block;
        padding: 10px 15px;
    }

    .sidebar ul li a:hover {
        background-color: #3c3c3c;
    }

    /* Navbar styles */
    .navbar {
        height: 60px;
        width: calc(100% - 200px); /* Full width minus sidebar width */
        background-color: #1c1c1c;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        position: fixed;
        top: 0;
        left: 200px;
    }

    .navbar h2 {
        margin: 0;
        font-size: 20px;
    }

    .navbar form {
        margin: 0;
    }

    .navbar button {
        background-color: #dc3545;
        border: none;
        padding: 10px 20px;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
    }

    .navbar button:hover {
        background-color: #c82333;
    }

    /* Main content styles */
    .main-content {
        margin-left: 200px;
        margin-top: 60px;
        padding: 20px;
        background-color: #2b2b2b;
        height: calc(100vh - 60px); /* Full height minus navbar height */
    }

    .container {
        max-width: 600px;
        margin: auto;
        background-color: #3c3c3c;
        padding: 20px;
        border-radius: 10px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        color: #fff;
        font-size: 14px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #444;
        border-radius: 5px;
        background-color: #3c3c3c;
        color: #fff;
    }

    .btn-primary {
        background-color: #28a745;
        border: none;
        padding: 10px 20px;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #218838;
    }
</style>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Perpus Admin</h2>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>

        <li><a href="{{ route('admin.reports') }}">Laporan</a></li>

    </ul>
</div>

<!-- Navbar -->
<div class="navbar">
    <h2>Tambah Barang</h2>
    <!-- Logout Button -->
    <form action="{{ route('logout') }}" method="POST" style="display:inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <h2>Tambah Barang</h2>
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
