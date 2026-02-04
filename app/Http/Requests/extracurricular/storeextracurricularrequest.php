<?php

namespace App\Http\Requests\extracurricular;

use Illuminate\Foundation\Http\FormRequest;

class storeextracurricularrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
           'extracurricular_name' => 'required|string|max:250',
           'description' => 'nullable|string',
           'instructor' => 'nullable|string',
        ];
        
    }
}
