@extends('layouts.main')
@section('title', 'Querty Shop - Resumen de orden')
@section('content')
<main>
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Resumen de la orden</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Referencia de compra</span>
                    <span>{{$order->reference}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Producto</h6>
                        <small class="text-muted">{{$order->customer_description_order}}</small>
                    </div>
                    <span class="text-muted">${{$order->customer_price_order}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Estado</h6>
                        <small class="text-muted">{{$order->translatedStatus()}}</small>
                    </div>
                </li>
                @if($order->status != 'PAYED' && $order->status != 'CREATED')
                <form class="needs-validation" method="POST" action="{{route('orders.pay')}}">
                    @csrf
                    <input type="hidden" name="customer_price_order" id="customer_price_order" value="{{$order->customer_price_order}}">
                    <input type="hidden" name="customer_description_order" id="customer_description_order" value="{{$order->customer_description_order}}">
                    <input type="hidden" name="customer_name" id="customer_name" value="{{$order->customer_name}}">
                    <input type="hidden" name="customer_email" id="customer_email" value="{{$order->customer_email}}">
                    <input type="hidden" name="customer_mobile" id="customer_mobile" value="{{$order->customer_mobile}}">
                    
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Reintentar comprar</button>
                </form>
                @endif
            </ul>
        </div>
    </div>
</main>
@endsection