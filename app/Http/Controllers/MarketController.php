<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class MarketController extends Controller
{
    public function index() {
        try {
            $products = Product::with('seller')->get();
            return view('market.index', compact('products'));
        } catch (Exception $exception){
            Log::error("Error in getting the products data in market controller");
        }
    }

    public function show(Product $product) {
       return view('market.show', compact('product'));
    }
}
