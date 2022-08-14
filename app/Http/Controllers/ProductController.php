<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers;

class ProductController extends Controller
{
    public function add()
    {
        return view('products.add');
    }
    public function StoreProduct(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'type' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->weight = ($request->input('weight'));
        $product->stock = $request->input('stock');
        $product->type = $request->input('type');
        $product->save();


        return redirect()->route('admin.dash');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }



    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'type' => 'required',
        ]);
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->type = $request->type;

        $product->save();

        return redirect()->route('admin.dash')->with('success', 'Products updated.');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.dash')->with('success', 'Product deleted successfully');
    }
}