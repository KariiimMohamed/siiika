<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name_en'     => 'required' ,
            'name_ar'     => 'required' ,
            'desc_en'     => 'required' ,
            'desc_ar'     => 'required' ,
            'price'       => 'required' ,
            'time'        => 'required' ,
            'qty'         => 'required' ,
            'img'         => $this->method() == "POST" ? 'required|mimes:png,jpg,jpeg' : 'nullable|mimes:png,jpg,jpeg' ,
        ];
    }
}
