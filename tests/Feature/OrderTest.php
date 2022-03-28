<?php

namespace Tests\Feature;

use App\Models\Orders;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Fakes\PlaceToPayFake;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * test_cannot_pay_because_form_validation_fail
     * 
     *
     * @return void
     */
    public function test_cannot_pay_because_form_validation_fail()
    {
        $this->post(route('orders.pay'), [
            'customer_name' => '',
            'customer_email' => 'asd',
            'customer_mobile' => 'as',
            'customer_price_order' => 'asd',
            'customer_description_order' => '',
        ])->assertStatus(302)
            ->assertSessionHasErrors([
                'customer_name',
                'customer_email',
                'customer_mobile',
                'customer_price_order',
                'customer_description_order',
            ]);
    }
    
    /**
     * test_can_pay_succesfully_and_show_order_detail
     *
     * @return void
     */
    public function test_can_pay_succesfully_and_show_order_detail()
    {
        //bypass service place to pay
        $this->app->bind(PlacetoPay::class, function () {
            return new PlaceToPayFake;
        });

        $this->post(route('orders.pay'), [
            'customer_name' => 'CARLOS VIDAL',
            'customer_email' => 'carlosvidal@test.com',
            'customer_mobile' => '3111111111',
            'customer_price_order' => '100',
            'customer_description_order' => 'BOTAS ASD',
        ])->assertStatus(302);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'CARLOS VIDAL',
            'customer_email' => 'carlosvidal@test.com',
            'customer_mobile' => '3111111111',
            'customer_price_order' => '100',
            'customer_description_order' => 'BOTAS ASD',
            'status' => 'CREATED',
        ]);

        $order = Orders::first();

        $this->get(route('orders.show', $order->reference))->assertOk()->assertViewIs('Orders.order_summary')
            ->assertSee($order->customer_description_order)
            ->assertSee('Pagado')
            ->assertSee($order->customer_price_order);

        $order->refresh();
        $this->assertEquals('PAYED', $order->status);
    }
}
