<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    public function index()
    {
        $specialOfferProducts = Products::where('is_special_offer', true)->get();

        return view('special_offer/index', compact('specialOfferProducts'));
    }
}
