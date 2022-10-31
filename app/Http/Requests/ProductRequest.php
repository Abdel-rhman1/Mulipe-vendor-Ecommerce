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

        return [
            'name_ar'=>['required' , 'string' , 'max:255'],
            'name_en'=>['required' , 'string' , 'max:255'],
            'qty'=>['required' , 'Numeric' , 'min:0'],
            'price'=>['required' , 'Numeric'],
            'category_id'=>['required' , 'Numeric' , 'min:0'],
            'unit_id'=>['required' , 'Numeric' , 'min:0'],
        ];
    }

    public function attributes(){
        return [
            'name_ar'=>'Arabic Name',
            'name_en'=>'English Name',
            'qty'=>'Product Quantity',
            'price'=>'Product Price',
            'category_id'=>'Product Category',
            'unit_id'=>'Product Unit'
        ];
    }

    public function messages(){
        return [
            'name_ar.required'=>__('product arabic name required'),
        ];
    }
}
