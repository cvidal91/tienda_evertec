<?php

namespace Tests\Feature;

use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_products()
    {
        $products = Products::factory()->count(5)->create();
        $response = $this->get(route('index'))->assertOk()->assertViewIs('Shop.index');

        $products->each(function (Products $product) use ($response) {
            $response->assertSee($product->product_name);
            $response->assertSee($product->product_price);
            $response->assertSee($product->product_short_description);
            $response->assertSee($product->product_url_image);
            $response->assertSee('Adquirir');
        });
    }
}
