<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerpusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perpuses')->insert([
            ['kode_barang' => 'B001', 'nama' => 'Buku Pemrograman PHP', 'stok' => 10],
            ['kode_barang' => 'B002', 'nama' => 'Buku Database MySQL', 'stok' => 8],
            ['kode_barang' => 'B003', 'nama' => 'Buku Framework Laravel', 'stok' => 5],
            ['kode_barang' => 'B004', 'nama' => 'Buku Desain Web', 'stok' => 12],
            ['kode_barang' => 'B005', 'nama' => 'Buku Algoritma', 'stok' => 6],
            ['kode_barang' => 'B006', 'nama' => 'Buku Jaringan Komputer', 'stok' => 7],
            ['kode_barang' => 'B007', 'nama' => 'Buku Pemrograman Java', 'stok' => 9],
            ['kode_barang' => 'B008', 'nama' => 'Buku Pemrograman Python', 'stok' => 10],
            ['kode_barang' => 'B009', 'nama' => 'Buku Struktur Data', 'stok' => 6],
            ['kode_barang' => 'B010', 'nama' => 'Buku Sistem Operasi', 'stok' => 4],
            ['kode_barang' => 'B011', 'nama' => 'Buku Manajemen Proyek IT', 'stok' => 7],
            ['kode_barang' => 'B012', 'nama' => 'Buku Keamanan Jaringan', 'stok' => 3],
            ['kode_barang' => 'B013', 'nama' => 'Buku Cloud Computing', 'stok' => 11],
            ['kode_barang' => 'B014', 'nama' => 'Buku Machine Learning', 'stok' => 9],
            ['kode_barang' => 'B015', 'nama' => 'Buku Artificial Intelligence', 'stok' => 5],
            ['kode_barang' => 'B016', 'nama' => 'Buku Desain Grafis', 'stok' => 8],
            ['kode_barang' => 'B017', 'nama' => 'Buku Fotografi', 'stok' => 6],
            ['kode_barang' => 'B018', 'nama' => 'Buku Animasi', 'stok' => 7],
            ['kode_barang' => 'B019', 'nama' => 'Buku Pemrograman Android', 'stok' => 10],
            ['kode_barang' => 'B020', 'nama' => 'Buku Pemrograman iOS', 'stok' => 8],
            ['kode_barang' => 'B021', 'nama' => 'Buku Keamanan Siber', 'stok' => 9],
            ['kode_barang' => 'B022', 'nama' => 'Buku Robotika', 'stok' => 3],
            ['kode_barang' => 'B023', 'nama' => 'Buku Pengolahan Citra', 'stok' => 5],
            ['kode_barang' => 'B024', 'nama' => 'Buku Virtual Reality', 'stok' => 7],
            ['kode_barang' => 'B025', 'nama' => 'Buku Augmented Reality', 'stok' => 6],
            ['kode_barang' => 'B026', 'nama' => 'Buku Big Data', 'stok' => 10],
            ['kode_barang' => 'B027', 'nama' => 'Buku Pemrograman R', 'stok' => 4],
            ['kode_barang' => 'B028', 'nama' => 'Buku Pemrograman Swift', 'stok' => 8],
            ['kode_barang' => 'B029', 'nama' => 'Buku Pemrograman Kotlin', 'stok' => 6],
            ['kode_barang' => 'B030', 'nama' => 'Buku Sistem Informasi', 'stok' => 9],
            ['kode_barang' => 'B031', 'nama' => 'Buku Internet of Things', 'stok' => 5],
            ['kode_barang' => 'B032', 'nama' => 'Buku Pengembangan Game', 'stok' => 8],
            ['kode_barang' => 'B033', 'nama' => 'Buku Pembelajaran Mesin', 'stok' => 7],
            ['kode_barang' => 'B034', 'nama' => 'Buku Pengembangan Web', 'stok' => 6],
            ['kode_barang' => 'B035', 'nama' => 'Buku Algoritma Canggih', 'stok' => 3],
            ['kode_barang' => 'B036', 'nama' => 'Buku Desain UI/UX', 'stok' => 10],
            ['kode_barang' => 'B037', 'nama' => 'Buku Sistem Kendali', 'stok' => 5],
            ['kode_barang' => 'B038', 'nama' => 'Buku Komunikasi Data', 'stok' => 8],
            ['kode_barang' => 'B039', 'nama' => 'Buku Pemrograman C++', 'stok' => 7],
            ['kode_barang' => 'B040', 'nama' => 'Buku Pemrograman Go', 'stok' => 6],
            ['kode_barang' => 'B041', 'nama' => 'Buku Pengenalan Komputer', 'stok' => 12],
            ['kode_barang' => 'B042', 'nama' => 'Buku Pemrograman Ruby', 'stok' => 5],
            ['kode_barang' => 'B043', 'nama' => 'Buku Analisis Data', 'stok' => 4],
            ['kode_barang' => 'B044', 'nama' => 'Buku Penambangan Data', 'stok' => 7],
            ['kode_barang' => 'B045', 'nama' => 'Buku Desain Aplikasi', 'stok' => 6],
            ['kode_barang' => 'B046', 'nama' => 'Buku Penulisan Kode Efisien', 'stok' => 8],
            ['kode_barang' => 'B047', 'nama' => 'Buku Cloud Native', 'stok' => 7],
            ['kode_barang' => 'B048', 'nama' => 'Buku Arsitektur Mikroservis', 'stok' => 6],
            ['kode_barang' => 'B049', 'nama' => 'Buku Pemrograman Scala', 'stok' => 5],
            ['kode_barang' => 'B050', 'nama' => 'Buku DevOps', 'stok' => 9],
        ]);
    }
}
