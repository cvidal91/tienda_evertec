<?php

namespace Tests\Fakes;

use Carbon\Carbon;
use Dnetix\Redirection\Message\RedirectInformation;
use Dnetix\Redirection\Message\RedirectResponse;
use Dnetix\Redirection\PlacetoPay;

class PlaceToPayFake extends PlacetoPay
{
    public function __construct()
    {
        parent::__construct([
            'login' => config('services.placetopay.login'),
            'tranKey' => config('services.placetopay.tranKey'),
            'baseUrl' => config('services.placetopay.baseUrl'),
        ]);
    }
    
    public function request($redirectRequest): RedirectResponse
    {
        return new RedirectResponse([
            'status' => [
                'status' => 'OK',
                'reason' => 'PC',
                'message' => 'La petición se ha procesado correctamente',
                'date' => Carbon::now()->format('c'),
            ],
            'requestId' => '25689',
            'processUrl' => "http://google.com",
        ]);
    }

    public function query(int $requestId): RedirectInformation
    {
        return new RedirectInformation(array (
            'requestId' => '51531',
            'status' => 
            array (
              'status' => 'APPROVED',
              'reason' => '00',
              'message' => 'La petición ha sido aprobada exitosamente',
              'date' => '2022-03-27T18:53:23-05:00',
            ),
            'request' => 
            array (
              'locale' => 'es_CO',
              'payer' => 
              array (
                'name' => 'CARLOS',
                'surname' => 'VIDAL',
                'email' => 'carlos.o.vidal@correounivalle.edu.co',
                'mobile' => '+57 312 1231232',
              ),
              'payment' => 
              array (
                'reference' => '1648421626',
                'description' => 'Botas offroad Forma Adventure Dry Color negro',
                'amount' => 
                array (
                  'currency' => 'COP',
                  'total' => 980000,
                ),
              ),
              'fields' => 
              array (
                0 => 
                array (
                  'keyword' => '_processUrl_',
                  'value' => 'https://checkout-co.placetopay.dev/session/51531/f29020ae88460f6c18b5ce959480943f',
                  'displayOn' => 'none',
                ),
              ),
              'returnUrl' => 'http://127.0.0.1:8000/orders/show/1648421626',
              'ipAddress' => '127.0.0.1',
              'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
              'expiration' => '2022-03-29T22:53:46+00:00',
              'captureAddress' => false,
              'skipResult' => false,
              'noBuyerFill' => false,
            ),
            'payment' => 
            array (
              0 => 
              array (
                'status' => 
                array (
                  'status' => 'APPROVED',
                  'reason' => '00',
                  'message' => 'Aprobada',
                  'date' => '2022-03-27T17:57:42-05:00',
                ),
                'internalReference' => '356448',
                'paymentMethod' => 'visa',
                'paymentMethodName' => 'Visa',
                'issuerName' => 'JPMORGAN CHASE BANK, N.A.',
                'amount' => 
                array (
                  'from' => 
                  array (
                    'currency' => 'COP',
                    'total' => 980000,
                  ),
                  'to' => 
                  array (
                    'currency' => 'COP',
                    'total' => 980000,
                  ),
                  'factor' => 1,
                ),
                'authorization' => '000000',
                'reference' => '1648421626',
                'receipt' => '99921862',
                'franchise' => 'CR_VS',
                'refunded' => false,
                'processorFields' => 
                array (
                  0 => 
                  array (
                    'keyword' => 'merchantCode',
                    'value' => '012988341',
                    'displayOn' => 'none',
                  ),
                  1 => 
                  array (
                    'keyword' => 'terminalNumber',
                    'value' => '00022645',
                    'displayOn' => 'none',
                  ),
                  2 => 
                  array (
                    'keyword' => 'bin',
                    'value' => '411111',
                    'displayOn' => 'none',
                  ),
                  3 => 
                  array (
                    'keyword' => 'expiration',
                    'value' => '1230',
                    'displayOn' => 'none',
                  ),
                  4 => 
                  array (
                    'keyword' => 'installments',
                    'value' => 1,
                    'displayOn' => 'none',
                  ),
                  5 => 
                  array (
                    'keyword' => 'lastDigits',
                    'value' => '1111',
                    'displayOn' => 'none',
                  ),
                ),
              ),
            ),
          ));
    }
}