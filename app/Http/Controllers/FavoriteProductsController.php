<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\FileViewFinder;

class FavoriteProductsController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();

        $favoriteProducts = Favorite::where('user_id', $user_id)->with('products')->get();

        return view('user.favorites', ['favoriteProducts' => $favoriteProducts]);

    }

    public function store(Request $request)
    {

        $user_id = Auth::id();
        $product_id = $request->input('product_id');

        Favorite::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);

        return redirect()->route('home');
    }
}
