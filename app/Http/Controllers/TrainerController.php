<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('admin.dataTrainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataTrainer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', 
            'gender' => 'required|string|max:10',
            'age' => 'required|integer',
            'phone' => 'required|string|max:15',
        ]);
    
        // Menangani upload gambar
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $pictureName = $picture->hashName();
            $picture->storeAs('public/trainers', $pictureName);
        } else {
            $pictureName = null;
        }
    
        // Menyimpan data ke database
        Trainer::create([
            'name' => $request->name,
            'category' => $request->category, 
            'description' => $request->description,
            'picture' => $pictureName,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.dataTrainer.index')->with('success', 'Data Trainer berhasil ditambahkan.');
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
    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('admin.dataTrainer.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'sometimes|required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // Validasi gambar
            'gender' => 'sometimes|required|string|max:10',
            'age' => 'sometimes|required|integer',
            'phone' => 'sometimes|required|string|max:15',
        ]);        
    
        $trainer = Trainer::findOrFail($id);
    
        if($request->hasFile('picture')) {
            $gambar = $request->file('picture');
            $gambar->storeAs('public/trainers', $gambar->hashName());
        
            Storage::delete('public/trainers/' . $trainer->picture);
        
            $gambarHashName = $gambar->hashName();
        }
    
        $dataToUpdate = [
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ];
    
        if ($request->filled('name')) {
            $dataToUpdate['name'] = $request->name;
        }

        if ($request->filled('category')) {
            $dataToUpdate['category'] = $request->category;
        }

        if ($request->filled('description')) {
            $dataToUpdate['description'] = $request->description;
        }
    
        if ($request->filled('gender')) {
            $dataToUpdate['gender'] = $request->gender;
        }
    
        if ($request->filled('age')) {
            $dataToUpdate['age'] = $request->age;
        }
    
        if ($request->filled('phone')) {
            $dataToUpdate['phone'] = $request->phone;
        }
    
        if (isset($gambarHashName)) {
            $dataToUpdate['picture'] = $gambarHashName;
        }
    
        $trainer->update($dataToUpdate);
        return redirect()->route('admin.dataTrainer.index')->with('success', 'Data Trainer berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainer = Trainer::findOrFail($id);

        if ($trainer->picture && Storage::exists('public/trainers/' . $trainer->picture)) {
            Storage::delete('public/trainers/' . $trainer->picture);
        }

        $trainer->delete();
    
        return redirect()->route('admin.dataTrainer.index')->with('success', 'Data Trainer berhasil dihapus.');
    }

    public function showTrainer()
    {
        $trainers = Trainer::all();
        return view('welcome', compact('trainers'));
    }

}
