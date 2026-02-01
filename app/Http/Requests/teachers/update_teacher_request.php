<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $teacherId = $this->route('id'); // dari route {id}

        return [
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:30|unique:teachers,nip,' . $teacherId,
            'school_subject' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
