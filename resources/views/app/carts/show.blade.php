@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('carts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.carts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.carts.inputs.user_id')</h5>
                    <span>{{ $cart->user_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.carts.inputs.identifier')</h5>
                    <span>{{ $cart->identifier ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.carts.inputs.product_id')</h5>
                    <span>{{ $cart->product_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.carts.inputs.name')</h5>
                    <span>{{ $cart->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.carts.inputs.price')</h5>
                    <span>{{ $cart->price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.carts.inputs.quantity')</h5>
                    <span>{{ $cart->quantity ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('carts.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Cart::class)
                <a href="{{ route('carts.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection