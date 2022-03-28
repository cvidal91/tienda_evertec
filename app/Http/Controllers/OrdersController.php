<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopFormRequest;
use App\Models\Orders;
use App\Services\PaymentServices\PaymentContractInterface;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::paginate(10);
        return view('Orders.list_orders', compact('orders'));
    }

    /**
     * pay
     *
     * @param  mixed $payment
     * @param  mixed $request
     * @return void
     */
    public function pay(PaymentContractInterface $payment, ShopFormRequest $request)
    {
        $arr_form = $request->all();
        $arr_form['reference'] = (int)microtime(true);

        $response_payment = $payment->pay($arr_form);

        if ($response_payment['success']) {

            $arr_form['customer_request_id'] = $response_payment['request_id'];
            $arr_form['customer_process_url'] = $response_payment['process_url'];
            Orders::createOrder($arr_form);

            return Redirect::to($response_payment['process_url']);
        }
    }

    /**
     * showDetail
     *
     * @param  mixed $reference
     * @param  mixed $payment
     * @return void
     */
    public function showDetail(Orders $order, PaymentContractInterface $payment)
    {
        $response_payment = $payment->getRequest($order->customer_request_id);
        
        if ($response_payment['success']) {
            switch ($response_payment['status']) {
                case 'APPROVED':
                    $order->status = Orders::getStatusPayed();
                    break;
                case 'REJECTED':
                    $order->status = Orders::getStatusRejected();
                    break;
            }
        }

        $order->save();
        $order->refresh();

        return view('Orders.order_summary', compact('order'));
    }
}
