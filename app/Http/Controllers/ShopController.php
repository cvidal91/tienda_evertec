<?php

namespace App\Http\Controllers;

use App\Models\Products;

class ShopController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $products = Products::getAll();
        return view('Shop.index', compact('products'));
    }
}
