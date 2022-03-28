<?php

namespace App\Services\PaymentServices;

interface PaymentContractInterface
{
    public function pay(array $form);
    public function getRequest(int $request_id);
}
