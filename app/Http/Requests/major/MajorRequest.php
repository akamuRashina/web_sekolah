<?php

namespace App\Http\Requests\major;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // izinkan request
    }

    public function rules(): array
    {
        return [
            'name_major' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullabel|image|mimes:png,jpg,jpeg|max:10240'
        ];
    }

    public function messages(): array
    {
        return [
            'name_major.required' => 'Nama jurusan wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'image.required' => 'Gambar wajib diisi'
        ];
    }
}
