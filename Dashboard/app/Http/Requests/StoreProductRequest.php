<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_en'=>['required','max:1000','string','min:2'],
            'name_ar'=>['required','max:1000','string','min:2'],
            'price'=>['required','numeric','min:1','max:99999.99'],
            'quantity'=>['nullable','integer','min:1','max:999'],
            'status'=>['nullable','integer','min:0','max:1'],
            'details_en'=>['nullable','string'],
            'details_ar'=>['nullable','string'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'photo'=>['required','max:1000','mimes:png,jpg,jpeg']
        ];
    }
}
