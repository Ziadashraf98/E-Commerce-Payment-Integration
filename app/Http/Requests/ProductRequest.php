<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $routeName = $this->route()->getName();

        return [
            'title_en'=>'required_without:title_ar|nullable|string',
            'title_ar'=>'required_without:title_en|nullable|string',
            'description_en'=>'nullable|string',
            'description_ar'=>'nullable|string',
            'image'=>[$routeName == 'products.store' ? 'required' : 'nullable'],
            'category_id'=>'required|exists:categories,id',
            'quantity'=>'nullable|numeric|max:255',
            'price'=>'nullable|numeric',
            'discount_price'=>'nullable|numeric',
        ];
    }
}
