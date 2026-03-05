<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class storecategoryrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_name'        =>'required|string|max:100|unique:categories,name',
            
        ];
    }
    public function messages(): array
    {
        return [
            'category_name.required' => 'Nama category wajib diisi',
            'category_name.unique'   => 'Nama category sudah ada',
            'category_name.max'      => 'Nama category maksimal 100 karakter',
        ];
    }
}


