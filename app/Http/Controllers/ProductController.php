<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers;

class ProductController extends Controller
{
    public function add()
    {
        $userId = Session::get('user_id');

        $user = User::find($userId);
        return view('products.add', ['user' => $user]);
    }
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'type' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->weight = ($request->input('weight'));
        $product->stock = $request->input('stock');
        $product->type = $request->input('type');
        $image = $request->file('image');
        $imageName = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('public/template/img'), $imageName);
        $product->image = $imageName;
        $product->save();


        return redirect()->route('admin.dash');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $userId = Session::get('user_id');

        $user = User::find($userId);
        return view('products.edit', compact('product'), ['user' => $user]);
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

    public function ChangePicture($id)
    {
        $product = Product::find($id);
        $userId = Session::get('user_id');

        $user = User::find($userId);
        return view('products.picture', compact('product'), ['user' => $user]);
    }
    public function UpdatePicture(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $product = Product::find($id);
        $image = $request->file('image');
        $imageName = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('public/template/img'), $imageName);
        $product->image = $imageName;

        $product->save();

        return redirect()->route('product.edit', ['id' => $product->id])->with('success', 'Products updated.');
    }
}