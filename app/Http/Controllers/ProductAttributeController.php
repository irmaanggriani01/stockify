<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /*
    public function index($productId)
    {
        $product = Product::findOrFail($productId);
        $attributes = $product->attributes; // Mengambil atribut produk terkait
        return view('admin.product.attribut.index', compact('product', 'attributes'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('admin.product.attribut.create', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $attribute = new ProductAttribute();
        $attribute->product_id = $productId;
        $attribute->name = $request->name;
        $attribute->value = $request->value;
        $attribute->save();

        return redirect()->route('product.attribut.index', $productId)->with('success', 'Atribut berhasil ditambahkan.');
    }

    public function edit($productId, $id)
    {
        $product = Product::findOrFail($productId);
        $attribute = ProductAttribute::findOrFail($id);
        return view('admin.product.attribut.edit', compact('product', 'attribute'));
    }

    public function update(Request $request, $productId, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $attribute = ProductAttribute::findOrFail($id);
        $attribute->name = $request->name;
        $attribute->value = $request->value;
        $attribute->save();

        return redirect()->route('product.attributes.index', $productId)->with('success', 'Atribut berhasil diperbarui.');
    }

    public function destroy($productId, $id)
    {
        $attribute = ProductAttribute::findOrFail($id);
        $attribute->delete();

        return redirect()->route('product.attributes.index', $productId)->with('success', 'Atribut berhasil dihapus.');
    }
        */
}
