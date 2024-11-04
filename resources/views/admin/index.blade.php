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

    /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #3c3c3c;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 20px;
    }

    th, td {
        padding: 10px 15px;
        text-align: center;
        border-bottom: 1px solid #444;
    }

    th {
        background-color: #1c1c1c;
        color: #fff;
        font-size: 14px;
    }

    td {
        background-color: #3c3c3c;
        color: #fff;
        font-size: 13px;
    }

    td:first-child, td:last-child {
        border-radius: 10px;
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-edit {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border-radius: 5px;
        font-size: 12px;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        padding: 8px 16px;
        border-radius: 5px;
        font-size: 12px;
    }

    .btn-primary {
        background-color: #28a745;
        border: none;
        padding: 8px 16px;
        color: #fff;
        font-size: 12px;
        border-radius: 5px;
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
    <h2>Data Barang</h2>
    <!-- Logout Button -->
    <form action="{{ route('logout') }}" method="POST" style="display:inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<!-- Main Content -->
<div class=" py-4 main-content">
    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Barang</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perpuses as $perpus)
                    <tr>
                        <td>{{ $perpus->kode_barang }}</td>
                        <td>{{ $perpus->nama }}</td>
                        <td>{{ $perpus->stok }}</td>
                        <td>
                            <div class="action-buttons">
                                <form action="{{ route('admin.edit', $perpus->id) }}" method="GET" style="display:inline">
                                    <button type="submit" class="btn-edit">Edit</button>
                                </form>
                                <form action="{{ route('admin.destroy', $perpus->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
