<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    public function filter(Request $request)
    {

        /*$selectedCategories = $request->input('category');
        $price = $request->input('price');


        $byPriceDESC = Products::orderBy('price', 'asc')->get();
        $byPriceASC = Products::orderBy('price', 'desc')->get();

        $filteredProducts = Products::where('category_id', $selectedCategories)->get();

        return response()->json(['filteredProducts' =>$filteredProducts, 'byPriceDESC' => $byPriceDESC, 'byPriceASC' => $byPriceASC]);*/
        $byPriceASC = null;
        $byPriceDESC = null;
        $selectedCategories = $request->input('category');
        $price = $request->input('price');

        $filteredProducts = Products::where('category_id', $selectedCategories)->get();

        if ($price === 'asc') {
            $byPriceASC = Products::orderBy('price', 'asc')->get();
        } elseif ($price === 'desc') {
            $byPriceDESC = Products::orderBy('price', 'desc')->get();
        }

        return response()->json(['filteredProducts' => $filteredProducts, 'byPriceDESC' => $byPriceDESC, 'byPriceASC' => $byPriceASC]);
    }
}
