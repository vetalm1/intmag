<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartStoreRequest extends FormRequest
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
            //'user_id' => ['nullable', 'max:255'],
            //'identifier' => ['required', 'max:255', 'string'],
            'product_id' => ['required', 'max:255'],
            //'name' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ];
    }

    public function getFormData()
    {
        $data = $this->request->all();

        $data['user_id'] = Auth::id();
        $data['name'] =  Product::find($data['product_id'])->name;


        return $data;
    }

}
