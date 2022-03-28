<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * getAll
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        $products = Products::select(
            'id',
            'product_name',
            'product_short_description',
            'product_price',
            'product_url_image'
        )->get();
        return $products;
    }
        
    /**
     * getProductById
     *
     * @param  mixed $id_product
     * @return Collection
     */
    public static function getProductById(int $id_product): ?Products
    {
        $products = Products::select(
            'product_name',
            'product_short_description',
            'product_price',
            'product_url_image'
        )->find($id_product);
        return $products;
    }
}
