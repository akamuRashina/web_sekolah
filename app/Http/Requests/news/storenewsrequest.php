<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class storenewsrequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'title'           => 'required|string|max:255',
            'content'         => 'required|string',
            'category_id'     => 'required|exists:categories,id',
            'upload_date'     => 'required|date',
            'status'          => 'required|in:draft,publish',
            
        ];
    }
}
