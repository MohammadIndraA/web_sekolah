<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaftarSekolahRequest extends FormRequest
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
            'name' => 'required',
            'status' => 'required',
            'deskripsi' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama daftar sekolah harus diisi.',
            'status.required' => 'Status daftar sekolah harus diisi.',
        ];
    }
}
