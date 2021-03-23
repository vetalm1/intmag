<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cateory_id' => ['required', 'max:255'],
            'name' => ['required', 'max:15', 'string'],
            'slug' => ['required', 'max:20', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
            'size' => ['required', 'numeric'],
            'weight' => ['required', 'numeric'],
        ];
    }
}
