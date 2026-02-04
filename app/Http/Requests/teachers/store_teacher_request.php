<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'           => 'required|string|max:255',
            'nip'            => 'nullable|string|max:30|unique:teachers,nip',
            'school_subject' => 'nullable|string|max:100',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama guru wajib diisi',
            'nip.unique' => 'NIP sudah terdaftar',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Foto harus berformat JPG atau PNG',
            'photo.max' => 'Ukuran foto maksimal 2MB',
        ];
    }
}
