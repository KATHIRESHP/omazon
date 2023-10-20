<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:seller|admin');
    }

    public function index()
    {
        $products = Product::where('seller_id', Auth::id())->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'count' => 'required|numeric|min:0',
            'profile' => 'required|image|mimes:jpg,ong,jpeg|max:2048',
            'description' => 'required|min:5|max:255',
            'price' => 'required|min:0',
            'discount' => 'required|min:0',
        ]);
        $newName = Auth::id() . '-' . $request->name . time() . '.' . $request->profile->extension();
        $request->profile->move(public_path('assets/products'), $newName);
        Product::create([
            'name' => $request->name,
            'profile' => $newName,
            'count' => $request->count,
            'seller_id' => Auth::id(),
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
        ]);

        return to_route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function show($product)
    {
        $product = Product::with('seller')->find($product);
//        dd($product);
        return view('products.show', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'count' => 'required|numeric|min:0',
            'description' => 'required|min:5|max:255',
            'price' => 'required|min:0',
            'discount' => 'required|min:0',
        ]);
        if ($request->has('profile')) {
            $imagePath = public_path('assets/products/' . $product->profile);
            unlink($imagePath);
            $newName = Auth::id() . '-' . $request->name . time() . '.' . $request->profile->extension();
            $request->profile->move(public_path('assets/products'), $newName);
            $product->profile = $newName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->count = $request->count;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->update();
        return to_route('products.index');
    }

    public function destroy(Product $product)
    {
        $imagePath = public_path('assets/products/' . $product->profile);
        unlink($imagePath);
        $product->delete();
        return back();
    }
}
