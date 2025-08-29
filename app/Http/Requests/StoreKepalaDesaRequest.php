<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreKepalaDesaRequest extends FormRequest
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
        $kepalaDesaId = $this->route('kepala_desa');

        return [
            'nama_kepala_desa' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'golongan_darah' => 'nullable|string|max:3',
            'kontak' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'masa_jabatan' => 'nullable|string|max:100',
            'nama_istri' => 'nullable|string|max:100',
            'jumlah_anak' => 'nullable|integer|min:0',
            'sambutan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'nama_kepala_desa.required' => 'Nama kepala desa harus diisi.',
            'nama_kepala_desa.string' => 'Nama kepala desa harus berupa teks.',
            'nama_kepala_desa.max' => 'Nama kepala desa maksimal 100 karakter.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'golongan_darah.string' => 'Golongan darah harus berupa teks.',
            'golongan_darah.max' => 'Golongan darah maksimal 3 karakter.',
            'kontak.string' => 'Kontak harus berupa teks.',
            'kontak.max' => 'Kontak maksimal 20 karakter.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'masa_jabatan.string' => 'Masa jabatan harus berupa teks.',
            'masa_jabatan.max' => 'Masa jabatan maksimal 100 karakter.',
            'nama_istri.string' => 'Nama istri harus berupa teks.',
            'nama_istri.max' => 'Nama istri maksimal 100 karakter.',
            'jumlah_anak.integer' => 'Jumlah anak harus berupa angka.',
            'jumlah_anak.min' => 'Jumlah anak tidak boleh kurang dari 0.',
            'sambutan.string' => 'Sambutan harus berupa teks.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Gambar harus berformat: jpeg, png, jpg, gif.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}