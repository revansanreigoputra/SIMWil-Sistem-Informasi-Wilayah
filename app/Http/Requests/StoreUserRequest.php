<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|phone:ID',
            'address' => 'nullable',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama user harus diisi.',
            'name.string' => 'Nama user harus berupa teks.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus terdiri dari minimal 6 karakter.',
            'phone.phone' => 'Nomor telepon tidak valid.',
            'address.string' => 'Alamat harus berupa teks.',
        ];
    }
}
