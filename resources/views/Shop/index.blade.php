@extends('layouts.main')
@section('title', 'Querty Shop - Home')
@section('content')
@if(count($products) > 0)
<main>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Accesorios</h1>
        <p class="fs-5 text-muted">Protecciones para motociclistas de aventura</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        @foreach($products as $product)
        <div class="col">
            <div class="card mb-12 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">{{$product->product_name}}</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">${{$product->product_price}}</h1>
                    <img src="{{$product->product_url_image}}" style="height: 240px;" class="card-img-top">
                    <p>{{$product->product_short_description}}</p>
                    <a href="{{route('item', ['id' => $product->id])}}" class="w-100 btn btn-lg btn-outline-primary">Adquirir</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@else
<main>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Accesorios</h1>
        <p class="fs-5 text-muted">Protecciones para motociclistas de aventura</p>
        <p class="fs-5 text-muted">No se encontraron producctos</p>
    </div>
</main>
@endif
@endsection