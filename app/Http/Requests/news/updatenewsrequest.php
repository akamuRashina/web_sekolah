<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class updatenewsrequest extends FormRequest
{
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
        return [
            'title'           => 'sometimes|required|string|max:255',
            'content'         => 'sometimes|required|string',
            'status'          => 'required|in:draft,publish',
        ];
    }
}
