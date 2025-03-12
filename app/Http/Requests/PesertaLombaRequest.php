<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesertaLombaRequest extends FormRequest
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
            'daftar_sekolah_id' => 'required',
            'kategori_lomba_id' => 'required',
            'no_perserta' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'daftar_sekolah_id.required' => 'Daftar sekolah harus diisi.',
            'kategori_lomba_id.required' => 'Kategori lomba harus diisi.',
            'no_perserta.required' => 'Nomor peserta harus diisi.',
            'no_perserta.numeric' => 'Nomor peserta harus berupa angka.',
        ];
    }
}
