@extends('layouts.main')
@section('title', 'Querty Shop - Resumen de orden')
@section('content')
<main>
    <div class="row g-12">
        <h4 class="mb-3">Ordenes</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Referencia</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->reference}}</td>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->customer_description_order}}</td>
                    <td>{{$order->customer_price_order}}</td>
                    <td>{{$order->translatedStatus()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                {{$orders->links()}}
            </ul>
        </nav>
    </div>
</main>

@endsection