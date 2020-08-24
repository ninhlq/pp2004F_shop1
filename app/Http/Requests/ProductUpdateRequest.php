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
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'product_code' => 'required|string|unique:products,product_code,' . $this->route('product'),
            'quantity_in_stock' => 'required|numeric',
            'excerpt' => 'required|string',
            'description' => 'required|string',
            'brand_id' => 'required|numeric',
            'buy_price' => 'required|numeric',
            'current_price' => 'required|numeric',
            'image' => 'required|array|min:1',
            'image.*' => 'required|string',
        ];
    }

    public function response(array $errors)
    {
        return \Redirect::back()->withErrors($errors)->withInput();
    }
}
