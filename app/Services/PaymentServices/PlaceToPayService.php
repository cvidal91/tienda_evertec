<?php

namespace App\Services\PaymentServices;

use Dnetix\Redirection\PlacetoPay;
use Exception;
use Illuminate\Support\Facades\Log;

class PlaceToPayService implements PaymentContractInterface
{
    private PlacetoPay $place_to_pay;

    public function __construct(PlacetoPay $place_to_pay)
    {
        $this->place_to_pay = $place_to_pay;
    }

    /**
     * pay
     * Create a pay order into Place to Pay
     *
     * @param  mixed $arr_form
     * @return array
     */
    public function pay(array $arr_form): array
    {
        $result = [
            'success' => false,
            'request_id' => "",
            'process_url' => "",
        ];

        try {

            Log::info('INSTANCE-PLACETOPAY=>', $arr_form);
            // $obj_place_to_pay = new PlacetoPay($this->credentials);

            $reference = $arr_form['reference'];

            $request = [
                'payment' => [
                    'reference' => $reference,
                    'description' => $arr_form['customer_description_order'],
                    'amount' => [
                        'currency' => 'COP',
                        'total' => $arr_form['customer_price_order'],
                    ],
                ],
                'expiration' => date('c', strtotime('+2 days')),
                'returnUrl' => route('orders.show', $reference),
                'ipAddress' => '127.0.0.1',
                'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
            ];

            Log::info('REQUEST-PLACETOPAY=>', $request);
            $response = $this->place_to_pay->request($request);
            Log::info('RESPONSE-PLACETOPAY=>', $response->toArray());

            if ($response->isSuccessful()) {
                $result['success'] = true;
                $result['request_id'] = $response->requestId();
                $result['process_url'] = $response->processUrl();
            } else {
                $result['message'] = $response->status()->message();
            }
        } catch (Exception $e) {
            Log::error('ERROR-PLACETOPAY=>', $arr_form);
            dd($e);
            throw new Exception('Error en la creación del objeto Place to Pay');
        }

        return $result;
    }

    /**
     * getRequest
     * Find a order by request id in Place to Pay
     *
     * @param  mixed $request_id
     * @return void
     */
    public function getRequest(int $request_id)
    {
        $result = [
            'success' => true,
            'status' => "CREATED",
        ];

        Log::info('INSTANCE-PLACETOPAY=>',  ['request_id' => $request_id]);

        Log::info('QUERY-PLACETOPAY=>', ['request_id' => $request_id]);
        $response = $this->place_to_pay->query($request_id);
        Log::info('RESPONSE-PLACETOPAY=>', $response->toArray());

        if ($response->isSuccessful()) {
            if ($response->status()->isApproved()) {
                $result['status'] = 'APPROVED';
            }
            if ($response->status()->isRejected()) {
                $result['status'] = 'REJECTED';
            }
            Log::info('SUCCESS-PLACETOPAY=>', $result);
        } else {
            $result['success'] = false;
            $result['message'] = $response->status()->message();
            Log::alert('NOSUCCESS-PLACETOPAY=>', ['request_id' => $request_id]);
        }

        return $result;
    }
}
