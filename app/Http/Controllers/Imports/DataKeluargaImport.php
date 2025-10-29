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
    // App\Http\Controllers\Imports\DataKeluargaImport.php

    public function collection(Collection $rows)
    {
        DB::beginTransaction();
        try {
            foreach ($rows as $row) {
                // --- 1. PREPARE RAW DATA (USING SPREADSHEET HEADERS) ---
                if (empty(trim($row['no_kk'] ?? '')) || empty(trim($row['kepala_keluarga'] ?? ''))) {
                    continue; // Lewati baris ini dan lanjut ke baris berikutnya
                }
                // Kolom DataKeluarga (KK) - Pastikan semua kolom yang ada di spreadsheet dimasukkan
                $dataKeluargaRaw = [
                    'no_kk' => (string) $row['no_kk'],
                    'kepala_keluarga' => $row['kepala_keluarga'],
                    'alamat' => $row['alamat'],
                    'rt' => (string) $row['rt'],
                    'rw' => (string) $row['rw'],

                    // DATA YANG AKAN DIPETAKAN (HARUS SESUAI KEY DI mapLabelsToIds)
                    'nama_desa' => $row['nama_desa'],
                    'nama_kecamatan' => $row['nama_kecamatan'],
                    'nama_pengisi' => $row['nama_pengisi'],
                ];

                // Kolom AnggotaKeluarga (AK)
                $anggotaKeluargaRaw = [
                    'nik' => (string) $row['nik_kepala_keluarga'] ?? null,
                    'no_akta_kelahiran' => $row['no_akta_kelahiran'] ?? null,
                    'jenis_kelamin' => $row['jenis_kelamin'] ?? null,
                    'tempat_lahir' => $row['tempat_lahir'] ?? null,
                    'tanggal_lahir' => $this->parseDate($row['tanggal_lahir']),
                    'tanggal_pencatatan' => $this->parseDate($row['tanggal_pencatatan']),
                    'status_perkawinan' => $row['status_perkawinan'] ?? null,

                    // DATA YANG AKAN DIPETAKAN (HARUS SESUAI KEY DI mapLabelsToIds)
                    'nama_agama' => $row['nama_agama'] ?? null,
                    'nama_golongan_darah' => $row['nama_golongan_darah'] ?? null,
                    'nama_kewarganegaraan' => $row['nama_kewarganegaraan'] ?? null,
                    'nama_pendidikan' => $row['nama_pendidikan'] ?? null,
                    'nama_mata_pencaharian' => $row['nama_mata_pencaharian'] ?? null,
                    'nama_kb' => $row['nama_kb'] ?? null,
                    'nama_cacat' => $row['nama_cacat'] ?? null,
                    'nama_kedudukan_pajak' => $row['nama_kedudukan_pajak'] ?? null,
                    'nama_lembaga' => $row['nama_lembaga_jenis'] ?? null,
                    'nama_hubungan_keluarga' => $row['nama_hubungan_keluarga'] ?? null,

                    // Kolom AK non-relasi
                    'etnis' => $row['etnis'] ?? null,
                    'detail_cacat' => $row['nama_cacat_detail'] ?? null,
                    'nama_lembaga_detail' => $row['nama_lembaga_detail'] ?? null,
                    'nama_orang_tua' => $row['nama_orang_tua'] ?? null,
                    'nama' => $row['kepala_keluarga'], // Nama anggota
                    'no_urut' => 1,
                ];

                // --- 2. MAP LABELS TO IDS ---
                $mappedKK = $this->mapLabelsToIds($dataKeluargaRaw);
                $mappedAnggota = $this->mapLabelsToIds($anggotaKeluargaRaw);

                // Cek jika ada error mapping
                if (!empty($mappedKK['errors']) || !empty($mappedAnggota['errors'])) {
                    $allErrors = array_merge($mappedKK['errors'], $mappedAnggota['errors']);
                    throw new \Exception("Mapping Error in row {$row->getrowindex()}: " . implode(', ', $allErrors));
                }

                // Hasil akhir setelah pemetaan (berisi ID, bukan nama)
                $dataKeluargaData = $mappedKK['data'];
                $anggotaKeluargaData = $mappedAnggota['data'];

                // --- 3. VALIDATION AND CREATION (Using the MAPPED IDs) ---

                // Validasi DataKeluarga (desa_id, kecamatan_id, nama_pengisi_id sudah ada)
                Validator::make($dataKeluargaData, [
                    'no_kk' => 'required|string|unique:data_keluargas,no_kk',
                    'kepala_keluarga' => 'required|string',
                    'desa_id' => 'required|exists:desas,id',
                    'kecamatan_id' => 'required|exists:kecamatans,id',
                    'nama_pengisi_id' => 'required|exists:perangkat_desas,id',
                    'alamat' => 'required|string',
                    'rt' => 'required|string',
                    'rw' => 'required|string',
                ])->validate();

                // Validasi AnggotaKeluarga
                if (empty($anggotaKeluargaData['hubungan_keluarga_id'])) {
                    throw new \Exception('Mapping failed: hubungan_keluarga_id not found. Value from Excel = ' . ($anggotaKeluargaRaw['nama_hubungan_keluarga'] ?? 'NULL'));
                }

                Validator::make($anggotaKeluargaData, [
                    'nik' => 'nullable|string|size:16|unique:anggota_keluargas,nik',
                    'hubungan_keluarga_id' => 'required|exists:hubungan_keluarga,id',
                    'agama_id' => 'required|exists:agama,id',
                    'pendidikan_id' => 'required|exists:pendidikans,id',
                    'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
                    'kewarganegaraan_id' => 'required|exists:kewarganegaraans,id',
                    'mata_pencaharian_id' => 'nullable|exists:mata_pencaharians,id',
                    'kb_id' => 'nullable|exists:kb,id',
                    'cacat_id' => 'nullable|exists:cacats,id',
                    'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
                    'lembaga_id' => 'nullable|exists:lembagas,id',
                    'tanggal_lahir' => 'nullable|date',
                    'tanggal_pencatatan' => 'nullable|date',
                ])->validate();


                // 4. Create Records
                $dataKeluarga = DataKeluarga::create($dataKeluargaData);
                $anggotaKeluargaData['data_keluarga_id'] = $dataKeluarga->id;
                AnggotaKeluarga::create($anggotaKeluargaData);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
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
    protected function mapLabelsToIds(array $data)
    {
        // Exact table & column mapping based on your models
        $mapping = [
            'nama_desa' => ['desas', 'nama_desa', 'desa_id'],
            'nama_kecamatan' => ['kecamatans', 'nama_kecamatan', 'kecamatan_id'],
            'nama_pengisi' => ['perangkat_desas', 'nama', 'nama_pengisi_id'],
            'nama_agama' => ['agama', 'agama', 'agama_id'],
            'nama_kb' => ['kb', 'kb', 'kb_id'],
            'nama_hubungan_keluarga' => ['hubungan_keluarga', 'nama', 'hubungan_keluarga_id'],
            'nama_cacat' => ['cacats', 'tipe', 'cacat_id'],
            'nama_lembaga' => ['lembagas', 'jenis', 'lembaga_id'],
            'nama_golongan_darah' => ['golongan_darahs', 'golongan_darah', 'golongan_darah_id'],
            'nama_kewarganegaraan' => ['kewarganegaraans', 'kewarganegaraan', 'kewarganegaraan_id'],
            'nama_pendidikan' => ['pendidikans', 'pendidikan', 'pendidikan_id'],
            'nama_mata_pencaharian' => ['mata_pencaharians', 'mata_pencaharian', 'mata_pencaharian_id'],
            'nama_kedudukan_pajak' => ['kedudukan_pajaks', 'kedudukan_pajak', 'kedudukan_pajak_id'],
        ];

        $mappedData = [];
        $errors = [];

        foreach ($mapping as $nameKey => [$table, $matchColumn, $idKey]) {
            if (isset($data[$nameKey])) {
                $label = trim($data[$nameKey]);
                if (!empty($label)) {
                    $id = DB::table($table)
                        ->whereRaw("LOWER($matchColumn) = ?", [strtolower($label)])
                        ->value('id');

                    if ($id) {
                        $mappedData[$idKey] = $id;
                    } else {
                        $errors[] = "Nilai '{$label}' pada kolom {$nameKey} tidak ditemukan di tabel {$table}.";
                    }
                }
            }
        }

        return ['data' => array_merge($data, $mappedData), 'errors' => $errors];
    }
}
