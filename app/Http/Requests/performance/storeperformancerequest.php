<?php

namespace App\Http\Requests\performance;

use Illuminate\Foundation\Http\FormRequest;

class storeperformancerequest extends FormRequest
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
           'title' => 'required|string|max:250',
           'category' => 'required|in:academic,non acadeic',
           'description' => 'nullable|string',
           'year' => 'nullable|date_format:Y',
           'image' => 'nullable|file|mimes:png,jpg,jpeg|max:10240',
        ];
    }
}
