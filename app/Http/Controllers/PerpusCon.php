<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\BorrowedItem;
use App\Models\Perpus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerpusCon extends Controller
{
    // Index method for admin to manage items
    public function adminIndex()
    {
        $perpuses = Perpus::orderBy('stok', 'ASC')->get();
        return view('admin.index', compact('perpuses'));
    }

    public function usersindex()
    {
        // You can pass any data to the view if needed here
        return view('users.index'); // Ensure the Blade view file is named 'home.blade.php'
    }
    // Index method for users to borrow items
    public function userDashboard(Request $request)
    {
        // Ambil parameter pencarian dari input (jika ada)
        $search = $request->input('search');

        // Ambil daftar buku berdasarkan pencarian atau ambil semua jika tidak ada pencarian
        $query = Perpus::query();
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        // Terapkan paginasi dengan batas 15 per halaman
        $perpuses = $query->orderBy('stok', 'ASC')->paginate(15);

        // Ambil item yang sudah dipinjam oleh user yang login
        $userId = Auth::id();
        $borrowedItems = BorrowedItem::where('user_id', $userId)->get();

        return view('users.dashboard', compact('perpuses', 'borrowedItems', 'search'));
    }

    // Method to show user dashboard with borrowed items
    public function userCart()
{
    $userId = Auth::id();
    $borrowedItems = BorrowedItem::with('perpus')->where('user_id', $userId)->get();

    return view('users.cart', compact('borrowedItems'));
}



    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:perpuses',
            'nama' => 'required',
            'stok' => 'required',
        ]);

        Perpus::create($request->all());
        return redirect()->route('admin.dashboard')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function viewReports()
    {
        // Retrieve borrowed items for the report
        $borrowedItems = BorrowedItem::with('user', 'perpus')->get();

        return view('admin.report', compact('borrowedItems'));
    }

    public function edit($id)
    {
        $perpus = Perpus::find($id);
        return view('admin.edit', compact('perpus'));
    }

    public function update(Request $request, $id)
    {
        $perpus = Perpus::find($id);
        $request->validate([
            'kode_barang' => 'required|unique:perpuses,kode_barang,' . $perpus->id,
            'nama' => 'required',
            'stok' => 'required',
        ]);

        $perpus->update($request->all());
        return redirect()->route('admin.dashboard')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $perpus = Perpus::find($id);

        // Check if the item was found
        if (!$perpus) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Barang tidak ditemukan');
        }

        $perpus->delete();
        return redirect()->route('admin.dashboard')
            ->with('success', 'Barang berhasil dihapus');
    }

    public function borrow($id)
    {
        $perpus = Perpus::find($id);
        return view('users.borrow', compact('perpus'));
    }

    public function borrowStore(Request $request, $id)
    {
        // Find the book by ID
        $perpus = Perpus::findOrFail($id); // Use findOrFail to throw a 404 error if not found
        $userId = Auth::id(); // Get the current user's ID

        // Validate the request input
        $request->validate([
            'jumlah' => 'required|integer|min:1|max:' . $perpus->stok,
        ]);

        // Adjust stock
        $perpus->stok -= $request->jumlah;
        $perpus->save();

        // Get the user's name
        $userName = Auth::user()->name;

        // Insert a new borrowed item record
        BorrowedItem::create([
            'perpus_id' => $id,
            'user_id' => $userId,
            'jumlah' => $request->jumlah,
            'name' => $userName, // Store the user's name
        ]);

        return redirect()->route('users.index')->with('success', 'Barang berhasil dipinjam');
    }

    public function returnItem($id)
{
    // Get the current authenticated user ID
    $userId = Auth::id();

    // Find the borrowed item by item ID and user ID
    $borrowedItem = BorrowedItem::where('id', $id)
        ->where('user_id', $userId)
        ->first();

    // Check if the borrowed item exists
    if (!$borrowedItem) {
        return redirect()->route('users.cart')
            ->with('error', 'Barang tidak ditemukan atau sudah dikembalikan sebelumnya');
    }

    // Restore the stock in the perpus table
    $perpus = Perpus::find($borrowedItem->perpus_id);
    if ($perpus) {
        $perpus->stok += $borrowedItem->jumlah;
        $perpus->save();
    }

    // Remove the borrowed item record
    $borrowedItem->delete();

    return redirect()->route('users.cart')
        ->with('success', 'Barang berhasil dikembalikan');
}


}
