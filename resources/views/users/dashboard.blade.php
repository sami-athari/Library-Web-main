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

    .main-content {
        margin-top: 80px;
        padding: 20px;
        background-color: #2c2c2c;
        color: #ddd;
    }

    .search-bar {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .search-bar form {
        display: flex;
        align-items: center;
        gap: 10px;
        background-color: #333;
        padding: 10px 15px;
        border-radius: 25px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    .search-bar input[type="text"] {
        background-color: #2a2a2a;
        border: none;
        color: #f3f3f3;
        padding: 8px 15px;
        border-radius: 20px;
        outline: none;
        font-size: 16px;
        transition: box-shadow 0.3s ease;
    }

    .search-bar input[type="text"]::placeholder {
        color: #888;
    }

    .search-bar button {
        background-color: #1d72b8;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 8px 15px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .search-bar button:hover {
        background-color: #155a8a;
        transform: scale(1.05);
    }

    /* Card styles */
    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        justify-items: center;
    }

    .card {
        background-color: #2a2a2a;
        border-radius: 10px;
        padding: 20px;
        width: 100%;
        max-width: 500px;
        display: flex;
        gap: 15px;
        color: #ddd;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        align-items: center;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
    }

    .card img {
        width: 80px;
        height: 120px;
        object-fit: cover;
        border-radius: 5px;
        background-color: #ddd;
    }

    .card-content {
        flex-grow: 1;
    }

    .card h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #fff;
    }

    .card p {
        font-size: 14px;
        margin-bottom: 10px;
        color: #ccc;
    }

    .btn-pinjam {
        background-color: #1d72b8;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-pinjam:hover {
        background-color: #155a8a;
        transform: scale(1.05);
    }

    /* Pagination styles */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        gap: 10px;
    }

    .pagination a, .pagination span {
        color: #ddd;
        background-color: #333;
        padding: 8px 12px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .pagination a:hover {
        background-color: #1d72b8;
        color: #fff;
        transform: scale(1.05);
    }

    .pagination .active {
        background-color: #1d72b8;
        color: #fff;
        font-weight: bold;
        transform: scale(1.05);
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

<div class="main-content">
    <div class="search-bar">
        <form action="{{ route('dashboard') }}" method="GET">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama buku">
            <button type="submit">Cari</button>
        </form>
    </div>

    <h2>Daftar Buku yang Tersedia</h2>
    <div class="card-container">
        @forelse ($perpuses as $perpus)
            <div class="card">
                <img src="https://via.placeholder.com/80x120" alt="Gambar Buku">
                <div class="card-content">
                    <p>Tanggal Buku</p>
                    <h3>{{ $perpus->nama }}</h3>
                    <p>Stok: {{ $perpus->stok }}</p>
                    <form action="{{ route('users.borrow', $perpus->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn-pinjam">Pinjam</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Tidak ada buku yang ditemukan.</p>
        @endforelse
    </div>

    <div class="pagination">
        @if ($perpuses->onFirstPage())
            <span>Previous</span>
        @else
            <a href="{{ $perpuses->previousPageUrl() }}">Previous</a>
        @endif

        @for ($i = 1; $i <= $perpuses->lastPage(); $i++)
            @if ($i == $perpuses->currentPage())
                <span class="active">{{ $i }}</span>
            @else
                <a href="{{ $perpuses->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        @if ($perpuses->hasMorePages())
            <a href="{{ $perpuses->nextPageUrl() }}">Next</a>
        @else
            <span>Next</span>
        @endif
    </div>
</div>
@endsection
