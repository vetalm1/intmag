<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProductSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'category' => ['max:15', 'nullable' ,'string'],
            'name' => ['max:15', 'nullable', 'string'],
            'price' => ['nullable'],
            'size' => ['nullable'],
            'weight' => ['nullable'],
        ];
    }

//    public function getFormData()
//    {
//        $data = $this->request->all();
//        $data = Arr::except($data, ['_token',]);
//        $data['slug'] = Str::slug($data['name'], '-', 'en');
//        return $data;
//    }
}
