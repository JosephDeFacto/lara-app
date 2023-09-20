<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    public function filter(Request $request)
    {
        $selectedCategories = $request->input('category');

        $filteredProducts = Products::where('category_id', $selectedCategories)->get();

        return response()->json($filteredProducts);
    }

}
