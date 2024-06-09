<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Classes;
use Illuminate\Http\Request;
use Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = Program::all();
        return view('admin.dataProgram.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataProgram.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_program' => 'required|string|max:255',
        'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    // Menangani upload gambar
    $pictureName = null;
    if ($request->hasFile('picture')) {
        $picture = $request->file('picture');
        $pictureName = $picture->hashName();
        $picture->storeAs('public/program', $pictureName);
    }

    // Memastikan nilai $pictureName tidak null sebelum menyimpannya
    Program::create([
        'nama_program' => $request->nama_program,
        'picture' => $pictureName,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    return redirect()->route('admin.dataProgram.index')->with('success', 'Data Program Kelas berhasil ditambahkan.');
}




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        return view('admin.dataProgram.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $program = Program::findOrFail($id);

        if($request->hasFile('picture')) {
            $gambar = $request->file('picture');
            $gambarName = $gambar->hashName();
            $gambar->storeAs('public/program', $gambarName);

            if ($program->picture) {
                Storage::delete('public/program/' . $program->picture);
            }

            $program->picture = $gambarName;
        }

        $program->update([
            'nama_program' => $request->nama_program,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.dataProgram.index')->with('success', 'Data Program Kelas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        if ($program->picture) {
            Storage::delete('public/program/' . $program->picture);
        }

        $program->delete();

        return redirect()->route('admin.dataProgram.index')->with('success', 'Data Program Kelas berhasil dihapus.');
    }
}
