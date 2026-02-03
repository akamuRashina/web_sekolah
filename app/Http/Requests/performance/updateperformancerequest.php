<?php

namespace App\Http\Requests\performance;

use Illuminate\Foundation\Http\FormRequest;

class updateperformancerequest extends FormRequest
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
        $performanceid = $this->route('adminperformance');
        return [
           'title' => 'sometimes|required|string|max:250',
           'category' => 'sometimes|required|in:akademik,non akadeik',
           'description' => 'sometimes|nullable|string',
           'year' => 'sometimes|nullable|date',
           'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg|max:10240',
        ];
    }
}
