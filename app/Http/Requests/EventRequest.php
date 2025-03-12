<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EventRequest extends FormRequest
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
        $imageRules = $request->method() === 'PUT'   
            ? 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'  
            : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';  
    
        return [  
            'name' => 'required',  
            'deskripsi' => 'nullable',  
            'status' => 'required',  
            'date' => 'required',  
            'alamat' => 'required',  
            'image' => $imageRules,  
        ];  
    }  

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori lomba harus diisi.',
            'status.required' => 'Status kategori lomba harus diisi.',
            'date.required' => 'Tanggal kategori lomba harus diisi.',
            'alamat.required' => 'Alamat kategori lomba harus diisi.',
            'image.required' => 'Gambar kategori lomba harus diisi.',
        ];
    }
}
