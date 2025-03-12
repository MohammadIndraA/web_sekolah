<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SettingRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'logo' => [
                $request->id ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'address' => 'nullable|string',
            'phone_1' => 'nullable|string',
            'phone_2' => 'nullable|string',
            'email' => 'nullable|email',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'youtube' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'Threads' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.required' => 'Logo is required',
            'logo.image' => 'Logo must be an image',
            'logo.mimes' => 'Logo must be a JPEG, PNG, JPG, GIF, or SVG file',
            'logo.max' => 'Logo size must not exceed 2MB',
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed 255 characters',
        ];
    }
}
