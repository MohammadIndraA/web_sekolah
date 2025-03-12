<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JurusanRequest extends FormRequest
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
            'deskripsi' => 'nullable',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama jurusan harus diisi.',
            'status.required' => 'Status jurusan harus diisi.',
        ];
    }
}
