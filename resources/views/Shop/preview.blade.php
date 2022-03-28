@extends('layouts.main')
@section('title', 'Querty Shop - Preview')
@section('content')
@if(isset($products) > 0)
<main>
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Detalle</span>
                <span class="badge bg-primary rounded-pill">1</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Producto</h6>
                        <small class="text-muted">{{$products->product_name}}</small>
                    </div>
                    <span class="text-muted">${{$products->product_price}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong>${{$products->product_price}}</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Información para la compra</h4>
            <form class="needs-validation" method="POST" action="{{route('orders.pay')}}">
                @csrf
                <input type="hidden" name="customer_price_order" id="customer_price_order" value="{{$products->product_price}}">
                <input type="hidden" name="customer_description_order" id="customer_description_order" value="{{$products->product_name}}">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="" value="{{old('customer_name')}}">
                        @error('customer_name')
                        <div class="invalid-feedback" style="display: block;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="customer_email" id="customer_email" placeholder="correo@correo.com" value="{{old('customer_email')}}" required>
                        @error('customer_email')
                        <div class="invalid-feedback" style="display: block;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="customer_mobile" id="customer_mobile" value="{{old('customer_mobile')}}" required>
                        @error('customer_mobile')
                        <div class="invalid-feedback" style="display: block;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        @error('product_price')
                        <div class="invalid-feedback" style="display: block;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        @error('product_short_descripction')
                        <div class="invalid-feedback" style="display: block;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Pagar</button>
            </form>
        </div>
    </div>
</main>
@else
<main>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">No se encontró el producto</h1>
    </div>
</main>
@endif
@endsection