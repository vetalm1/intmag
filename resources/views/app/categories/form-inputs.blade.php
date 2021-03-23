@php $editing = isset($category) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="id"
            label="Id"
            value="{{ old('id', ($editing ? $category->id : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $category->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="parent_id"
            label="Parent Id"
            value="{{ old('parent_id', ($editing ? $category->parent_id : '')) }}"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>
</div>
