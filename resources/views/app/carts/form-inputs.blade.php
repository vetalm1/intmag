@php $editing = isset($cart) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="user_id"
            label="User Id"
            value="{{ old('user_id', ($editing ? $cart->user_id : '')) }}"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="identifier"
            label="Identifier"
            value="{{ old('identifier', ($editing ? $cart->identifier : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="product_id"
            label="Product Id"
            value="{{ old('product_id', ($editing ? $cart->product_id : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $cart->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="price"
            label="Price"
            value="{{ old('price', ($editing ? $cart->price : '')) }}"
            max="255"
            step="0.01"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            value="{{ old('quantity', ($editing ? $cart->quantity : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
