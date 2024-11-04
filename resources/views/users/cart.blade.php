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
        color: #fff;
        font-size: 20px;
        margin: 0;
    }

    /* Logout button */
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

    /* Main content area */
    .main-content {
        margin-top: 80px; /* Space for the navbar */
        padding: 20px;
        background-color: #2c2c2c;
        color: #ddd;
    }

    /* Header styles */
    .main-content h2 {
        color: #f3f3f3;
        margin-bottom: 20px;
        font-size: 24px;
        border-bottom: 1px solid #444;
        padding-bottom: 5px;
    }

    /* Table styles */
    .table-container {
        background-color: #1f1f1f;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        margin-top: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
        border: 1px solid #444;
    }

    th {
        background-color: #333;
        color: #f3f3f3;
    }

    td {
        background-color: #444;
        color: #f3f3f3;
    }

    .btn-return {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-return:hover {
        background-color: #218838;
        transform: scale(1.05);
    }
</style>

<!-- Navbar -->
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

<div class="main-content">
    <h2>Barang di Pinjam</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Jumlah Dipinjam</th>
                    <th>Tanggal Dipinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowedItems as $item)
                    <tr>
                        <td>{{ $item->perpus->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>
                            <form action="{{ route('users.return', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-return">Kembalikan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
