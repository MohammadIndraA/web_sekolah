<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GambarLombaRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
           'gambar' => [
            $request->id ? 'nullable' : 'required', // Wajib saat tambah, opsional saat edit
            'array', // Memastikan gambar adalah array (multi-upload)
            'max:10', // Maksimal 5 gambar (opsional, bisa diubah)
        ],
        'gambar.*' => [
            'image', // Memastikan setiap file adalah gambar
            'mimes:jpeg,png,jpg,gif,svg', // Format yang diizinkan
            'max:6048', // Maksimum ukuran 6MB per gambar
        ],
            'event_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'gambar.required' => 'Gambar harus diisi.',
            'gambar.mimes' => 'Format gambar tidak didukung.',
            'gambar.max' => 'Ukuran gambar maksimal 6MB.',
            'event_id.required' => 'Event ID harus diisi.',
        ];
    }
}
