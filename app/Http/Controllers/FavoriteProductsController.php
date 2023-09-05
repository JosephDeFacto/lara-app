<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteProductsController extends Controller
{
    public function index()
    {
        $user = Auth::id();

        $products = User::where('id', $user)->with('favorites')->first();

        return view('user/favorites', ['products' => $products]);
    }
}
