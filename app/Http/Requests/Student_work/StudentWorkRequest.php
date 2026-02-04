<?php

namespace App\Http\Requests\Student_Work;

use Illuminate\Foundation\Http\FormRequest;

class StudentWorkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_of_work' => 'required|string|max:255',
            'description' => 'required|string',
            'file_of_work' => 'nullable|file|mimes:pdf,doc,docx,zip,jpg,jpeg,png|max:5120',
            'id_major' => 'required|exists:majors,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title_of_work.required' => 'Judul karya wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'file_of_work.required' => 'File karya wajib diisi',
            'id_major.required' => 'Jurusan wajib dipilih',
            'id_major.exists' => 'Jurusan tidak valid'
        ];
    }
}
