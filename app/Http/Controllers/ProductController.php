<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        // Ambil data product_attributes beserta informasi nama produk
        $productAttributes = ProductAttribute::with('product')->get();

        return view('admin.product.attribute.index', compact('productAttributes'));
    }

    public function create()
    {
        // Ambil semua produk untuk pilihan di form
        $products = Product::all();
        return view('admin.product.attribute.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'value' => 'required|string|max:255',
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
        ]);

        // Simpan data ke tabel product_attributes
        ProductAttribute::create([
            'product_id' => $request->product_id,
            'value' => $request->value,
            'size' => $request->size,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.product.attribute.index')->with('success', 'Attribut produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Ambil data product_attribute dan produk untuk pilihan form
        $attribute = ProductAttribute::findOrFail($id);
        $products = Product::all();

        return view('admin.product.attribute.edit', compact('attribute', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'value' => 'required|string|max:255',
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
        ]);

        // Update data product_attributes
        $attribute = ProductAttribute::findOrFail($id);
        $attribute->update([
            'product_id' => $request->product_id,
            'value' => $request->value,
            'size' => $request->size,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.product.attribute.index')->with('success', 'Attribut produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data product_attribute
        $attribute = ProductAttribute::findOrFail($id);
        $attribute->delete();

        return redirect()->route('admin.product.attribute.index')->with('success', 'Attribut produk berhasil dihapus');
    }
}
