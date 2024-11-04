<!-- resources/views/admin/report.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    /* Existing styles from the Data Barang page */
    body { margin: 0; font-family: Arial, sans-serif; background-color: #2b2b2b; color: #fff; }
    .sidebar { width: 200px; height: 100vh; background-color: #000; position: fixed; top: 0; left: 0; padding-top: 20px; }
    .sidebar h2 { color: #fff; text-align: center; margin-bottom: 30px; font-size: 20px; }
    .sidebar ul { list-style-type: none; padding: 0; }
    .sidebar ul li { margin: 20px 0; }
    .sidebar ul li a { color: #fff; text-decoration: none; font-size: 16px; display: block; padding: 10px 15px; }
    .sidebar ul li a:hover { background-color: #3c3c3c; }
    .navbar { height: 60px; width: calc(100% - 200px); background-color: #1c1c1c; color: #fff; display: flex; justify-content: space-between; align-items: center; position: fixed; top: 0; left: 200px; }
    .navbar h2 {  font-size: 20px; }
    .navbar button { background-color: #dc3545; border: none; padding: 10px 20px; color: #fff; cursor: pointer; border-radius: 5px; }
    .navbar button:hover { background-color: #c82333; }
    .main-content { margin-left: 200px; margin-top: 60px; padding: 20px; background-color: #2b2b2b; height: calc(100vh - 60px); }
    table { width: 100%; border-collapse: collapse; background-color: #3c3c3c; border-radius: 10px; overflow: hidden; margin-top: 20px; }
    th, td { padding: 10px 15px; text-align: center; border-bottom: 1px solid #444; }
    th { background-color: #1c1c1c; color: #fff; font-size: 14px; }
    td { background-color: #3c3c3c; color: #fff; font-size: 13px; }
    .action-buttons { display: flex; justify-content: center; gap: 10px; }
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
    <h2>Laporan Peminjaman</h2>
    <form action="{{ route('logout') }}" method="POST" style="display:inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<!-- Main Content -->
<div class="py-4 main-content">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowedItems as $borrow)
                    <tr>
                        <td>{{ $borrow->name }}</td>
                        <td>{{ $borrow->perpus->nama ?? 'N/A' }}</td>
                        <td>{{ $borrow->created_at->format('Y-m-d') }}</td>
                        <td>{{ $borrow->return_date ? $borrow->return_date->format('Y-m-d') : 'Belum Dikembalikan' }}</td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>
@endsection
