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

    
    /**
     * showPreview
     *
     * @param  int $id_product
     * @return void
     */
    public function showPreview(int $id_product)
    {
        $products = Products::getProductById($id_product);
        return view('Shop.preview', compact('products'));
    }
}
