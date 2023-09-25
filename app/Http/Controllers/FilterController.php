<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    public function filter(Request $request)
    {

        $byPriceASC = null;
        $byPriceDESC = null;
        $selectedCategories = $request->input('category');
        $price = $request->input('price');
        $brand = $request->input('brand');

        $filteredProducts = Products::where('category_id', $selectedCategories)->get();
        $byBrand = Products::where('brand_id', $brand)->get();

        if ($price === 'asc') {
            $byPriceASC = Products::orderBy('price', 'asc')->get();
        } elseif ($price === 'desc') {
            $byPriceDESC = Products::orderBy('price', 'desc')->get();
        }

        return response()->json(['filteredProducts' => $filteredProducts, 'byBrand' => $byBrand, 'byPriceDESC' => $byPriceDESC, 'byPriceASC' => $byPriceASC]);
    }
}
