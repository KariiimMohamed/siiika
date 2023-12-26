<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [

            'title_ar'     => 'required' ,
            'title_en'     => 'required' ,
            'desc_ar'      => 'required' ,
            'desc_en'      => 'required' ,
            'img'          => $this->method() == "POST" ? 'required|mimes:png,jpg,jpeg' : 'nullable|mimes:png,jpg,jpeg' ,       
            
        ];
    }
}
