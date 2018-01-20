<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'category_id' => 'required',
            'featured_image_id' => 'required',  
            'lat' => 'required|Numeric',
            'lang' => 'required|Numeric'
        ];
    }
}
