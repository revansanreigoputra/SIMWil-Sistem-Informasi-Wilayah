<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreCustomerRequest extends FormRequest
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
        $customerId = $this->route('customer');

        return [
            'name' => 'required|string|unique:customers,name' . ($customerId ? ',' . $customerId : ''),
            'phone' => 'required|phone:ID',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
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
            'name.required' => 'Nama customer harus diisi.',
            'name.string' => 'Nama customer harus berupa teks.',
            'name.unique' => 'Nama customer sudah terdaftar.',
            'phone.required' => 'Nomor telepon harus diisi.',
            'phone.phone' => 'Nomor telepon tidak valid.',
            'email.email' => 'Format email tidak valid.',
            'address.string' => 'Alamat harus berupa teks.',
        ];
    }
}
