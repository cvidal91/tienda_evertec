<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Products();
        $product->product_name = "Botas offroad Forma Adventure Dry Color negro";
        $product->product_short_description = "Botas caña alta, impermeables, inmovilizador de tobillo y comodas. Color marrón";
        $product->product_price = 980000;
        $product->product_url_image = "https://cdn.shopify.com/s/files/1/0297/3981/0869/products/ADVENTURE-BROWN_444x395.jpg?v=1589854087";

        $product->save();

        $product2 = new Products();
        $product2->product_name = "Pantalón de protección Clover Ventouring";
        $product2->product_short_description = "Pantalon resistente a fricción con protecciones en keblar";
        $product2->product_price = 1180000;
        $product2->product_url_image = "https://cdn.shopify.com/s/files/1/0297/3981/0869/products/1369N-N1_444x597.jpg?v=1620760002";

        $product2->save();

        $product3 = new Products();
        $product3->product_name = "Pechera EVS - Sport Vest Color negro";
        $product3->product_short_description = "Pechera para motocros de alta resistencia flexible y muy liviana";
        $product3->product_price = 980000;
        $product3->product_url_image = "https://cdn.shopify.com/s/files/1/0297/3981/0869/products/SPORT_VEST_1_444x444.jpg?v=1632428292";

        $product3->save();
    }
}
