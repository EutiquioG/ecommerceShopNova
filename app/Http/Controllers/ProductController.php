<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //  PANEL ADMIN (LISTADO)
    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    //  LISTADO NORMAL (SI LO USAS PARA CLIENTES)
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    //  CREAR
    public function create()
    {
        return view('products.create');
    }

    //  GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products')
            ->with('success', 'Producto creado correctamente');
    }

    //  EDITAR
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    //  ACTUALIZAR
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products')
            ->with('success', 'Producto actualizado');
    }

    //  ELIMINAR
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products') // 👈 CAMBIO IMPORTANTE
            ->with('success', 'Producto eliminado');
    }
}
