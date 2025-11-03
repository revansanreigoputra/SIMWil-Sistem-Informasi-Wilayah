<?php

namespace App\Http\Controllers\Imports;

use App\Models\DataKeluarga;
use App\Models\AnggotaKeluarga;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DataKeluargaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // Assuming your column headers are lowercase (Laravel Excel standard)
        // If not, use the names from your template file: 'NO_KK', 'KEPALA_KELUARGA', etc.

        // Start a transaction for data integrity
        DB::beginTransaction();
        try {
            foreach ($rows as $row) {
                // Map the row data, ensuring keys match the import template/heading row
                $dataKeluargaData = [
                    'no_kk' => (string) $row['no_kk'],
                    'kepala_keluarga' => $row['kepala_keluarga'],
                    'alamat' => $row['alamat'],
                    'rt' => (string) $row['rt'],
                    'rw' => (string) $row['rw'],
                    // Use ID columns for foreign keys
                    'desa_id' => $row['desa_id'], 
                    'kecamatan_id' => $row['kecamatan_id'],
                    'nama_pengisi_id' => $row['nama_pengisi_id'],
                ];

                $anggotaKeluargaData = [
                    'nik' => (string) $row['nik_kepala_keluarga'] ?? null,
                    'no_akta_kelahiran' => $row['no_akta_kelahiran'] ?? null,
                    'jenis_kelamin' => $row['jenis_kelamin'] ?? null,
                    'hubungan_keluarga_id' => $row['hubungan_keluarga_id'] ?? null,
                    'tempat_lahir' => $row['tempat_lahir'] ?? null,
                    // Handle date conversion
                    'tanggal_lahir' => $this->parseDate($row['tanggal_lahir']),
                    'tanggal_pencatatan' => $this->parseDate($row['tanggal_pencatatan']),
                    'status_perkawinan' => $row['status_perkawinan'] ?? null,
                    'agama_id' => $row['agama_id'] ?? null,
                    'golongan_darah_id' => $row['golongan_darah_id'] ?? null,
                    'kewarganegaraan_id' => $row['kewarganegaraan_id'] ?? null,
                    'etnis' => $row['etnis'] ?? null,
                    'pendidikan_id' => $row['pendidikan_id'] ?? null,
                    'mata_pencaharian_id' => $row['mata_pencaharian_id'] ?? null,
                    'kb_id' => $row['kb_id'] ?? null,
                    'cacat_id' => $row['cacat_id'] ?? null,
                    'nama_cacat' => $row['nama_cacat_detail'] ?? null,
                    'kedudukan_pajak_id' => $row['kedudukan_pajak_id'] ?? null,
                    'lembaga_id' => $row['lembaga_id'] ?? null,
                    'nama_lembaga' => $row['nama_lembaga_detail'] ?? null,
                    'nama_orang_tua' => $row['nama_orang_tua'] ?? null,
                    // Required fields for AnggotaKeluarga
                    'nama' => $row['kepala_keluarga'], 
                    'no_urut' => 1, // Head of Family is always number 1
                ];

                // 1. Validate DataKeluarga fields
                Validator::make($dataKeluargaData, [
                    'no_kk' => 'required|string|unique:data_keluargas,no_kk',
                    'kepala_keluarga' => 'required|string', 
                    'desa_id' => 'required|exists:desas,id',
                    // Add other validations as per your store method
                ])->validate();

                // 2. Validate AnggotaKeluarga fields
                Validator::make($anggotaKeluargaData, [
                    'nik' => 'nullable|string|size:16|unique:anggota_keluargas,nik',
                    'hubungan_keluarga_id' => 'nullable|exists:hubungan_keluarga,id',
                    // Add other validations
                ])->validate();


                // 3. Create DataKeluarga
                $dataKeluarga = DataKeluarga::create($dataKeluargaData);

                // 4. Create AnggotaKeluarga (Kepala Keluarga)
                $anggotaKeluargaData['data_keluarga_id'] = $dataKeluarga->id;
                AnggotaKeluarga::create($anggotaKeluargaData);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle error, maybe throw a more specific exception or log the error
            throw new \Exception("Gagal mengimpor data keluarga: " . $e->getMessage());
        }
    }

    /**
     * Helper to parse dates from Excel, which often reads them as floats.
     * @param mixed $date
     * @return string|null
     */
    protected function parseDate($date)
    {
        if (empty($date)) {
            return null;
        }

        // Check if the value is an Excel numeric date
        if (is_numeric($date) && $date > 0) {
            // Convert Excel numeric date to Carbon date object (assuming 1900 date system)
            try {
                return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date))->toDateString();
            } catch (\Exception $e) {
                // Fallback to string if conversion fails
                return $date;
            }
        }
        
        // Attempt to parse as a standard date string
        return date('Y-m-d', strtotime($date));
    }
}