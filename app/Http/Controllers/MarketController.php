<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class MarketController extends Controller
{
    public function index() {
        try {
            $products = Product::with('seller')
                ->select('id', 'profile', 'name', 'price', 'discount', 'description')
                ->get();
            return view('market.index', compact('products'));
        } catch (Exception $exception){
            Log::error("Error in getting the products data in market controller");
        }
    }

    public function show(Product $product) {
       return view('market.show', compact('product'));
    }

    public function addCart(Product $product)
    {
        $duplicate  = cart::where('user_id', Auth::id())->where('product_id', $product->id)->get();
        $cart = cart::create([
            "product_id" => $product->id,
            "user_id" => Auth::id(),
        ]);

        return back();
    }
}
