<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Trainer;
use App\Models\Classes;
use App\Models\Product;
use App\Models\Program;

class UlasanController extends Controller
{
    public function index()
    {
        $classes = Classes::with('trainer')->get();
        $groupedClasses = $classes->groupBy('day');
        $trainers = Trainer::all();
        $products = Product::all();
        $programs = Program::all();
        $ulasan = Ulasan::with('user')->get();
        return view('welcome', compact('classes','groupedClasses','trainers','ulasan','products','programs'));
    }

    public function store(Request $request)
{
    // Memeriksa apakah pengguna terotentikasi
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Anda harus masuk terlebih dahulu.');
    }
    
    // Validasi data yang diterima dari request
    $validatedData = $request->validate([
        'rating' => 'required|integer|between:1,5',
        'ulasan' => 'required|string|max:100',
    ]);

    // Ambil ID pengguna yang terotentikasi
    $user_id = auth()->id();

    // Buat ulasan baru
    $ulasan = new Ulasan();
    $ulasan->user_id = $user_id;
    $ulasan->rating = $validatedData['rating'];
    $ulasan->ulasan = $validatedData['ulasan'];
    $ulasan->save();

    // Redirect pengguna kembali ke halaman welcome dengan pesan sukses
    return redirect()->route('dashboard')->with('success', 'Ulasan berhasil ditambahkan.');
}

}
