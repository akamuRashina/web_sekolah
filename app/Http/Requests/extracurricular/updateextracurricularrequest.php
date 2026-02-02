<?php

namespace App\Http\Requests\extracurricular;

use Illuminate\Foundation\Http\FormRequest;

class updateextracurricularrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $extracurricularid = $this->route('adminextracurricular');
        return [
           'extracurricular_name' => 'required|string|max:250',
           'description' => 'nullable|string',
           'instructor' => 'nullable|string',
        ];
    }
}
