<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.dataFitnes.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataFitnes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->name_product = $request->name_product;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $pictureName = $picture->hashName();
            $picture->storeAs('public/product', $pictureName);
            $product->picture = $pictureName;
        }

        $product->save();

        return redirect()->route('admin.dataFitnes.index')->with('success', 'Produk berhasil ditambahkan');
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
        $product = Product::findOrFail($id);
        return view('admin.dataFitnes.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_product' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name_product = $request->name_product;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('picture')) {
            // Delete old picture if exists
            if ($product->picture) {
                Storage::delete('public/product/' . $product->picture);
            }
            // Store new picture
            $picture = $request->file('picture');
            $pictureName = $picture->hashName();
            $picture->storeAs('public/product', $pictureName);
            $product->picture = $pictureName;
        }

        $product->save();

        return redirect()->route('admin.dataFitnes.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->picture) {
            Storage::delete('public/product/' . $product->picture);
        }

        $product->delete();

        return redirect()->route('admin.dataFitnes.index')->with('success', 'Produk berhasil dihapus');
    }
}
