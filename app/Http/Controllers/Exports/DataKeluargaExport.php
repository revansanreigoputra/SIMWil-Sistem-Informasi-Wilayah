<?php

namespace App\Http\Controllers\Exports;
use App\Models\DataKeluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataKeluargaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Eager load relationships for efficiency
        return DataKeluarga::with([
            'desa', 
            'kecamatan', 
            'pengisi', 
            'anggotaKeluarga' => function ($query) {
                // We only want the AnggotaKeluarga record that is the 'Kepala Keluarga' (assuming 'no_urut' = 1)
                $query->where('no_urut', 1)->with('hubunganKeluarga', 'agama', 'golonganDarah', 'kewarganegaraan', 'pendidikan', 'mataPencaharian', 'kb', 'cacat', 'kedudukanPajak', 'lembaga');
            }
        ])->get();
    }

    /**
     * Define the column headers for the export file.
     * These should match the import template columns.
     * Note: IDs are exported for easier re-import/data checking.
     */
    public function headings(): array
    {
        return [
            'NO_KK',
            'KEPALA_KELUARGA',
            'ALAMAT',
            'RT',
            'RW',
            'DESA_ID', // For faster lookup if needed
            'NAMA_DESA',
            'KECAMATAN_ID', // For faster lookup if needed
            'NAMA_KECAMATAN',
            'NAMA_PENGISI_ID',
            'NIK_KEPALA_KELUARGA',
            'NO_AKTA_KELAHIRAN',
            'JENIS_KELAMIN',
            'HUBUNGAN_KELUARGA_ID',
            'NAMA_HUBUNGAN_KELUARGA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'TANGGAL_PENCATATAN',
            'STATUS_PERKAWINAN',
            'AGAMA_ID',
            'NAMA_AGAMA',
            'GOLONGAN_DARAH_ID',
            'NAMA_GOLONGAN_DARAH',
            'KEWARGANEGARAAN_ID',
            'NAMA_KEWARGANEGARAAN',
            'ETNIS',
            'PENDIDIKAN_ID',
            'NAMA_PENDIDIKAN',
            'MATA_PENCAHARIAN_ID',
            'NAMA_MATA_PENCAHARIAN',
            'KB_ID',
            'NAMA_KB',
            'CACAT_ID',
            'NAMA_TIPE_CACAT',
            'NAMA_CACAT_DETAIL',
            'KEDUDUKAN_PAJAK_ID',
            'NAMA_KEDUDUKAN_PAJAK',
            'LEMBAGA_ID',
            'NAMA_LEMBAGA_JENIS',
            'NAMA_LEMBAGA_DETAIL',
            'NAMA_ORANG_TUA',
        ];
    }
    
    /**
     * Map each row from the collection to the export columns.
     * @param mixed $dataKeluarga
     * @return array
     */
    public function map($dataKeluarga): array
    {
        // Get the head of family member (AnggotaKeluarga with no_urut = 1)
        $kepalaKeluarga = $dataKeluarga->anggotaKeluarga->first(); 

        return [
            $dataKeluarga->no_kk,
            $dataKeluarga->kepala_keluarga, // Name from DataKeluarga
            $dataKeluarga->alamat,
            $dataKeluarga->rt,
            $dataKeluarga->rw,
            $dataKeluarga->desa_id,
            $dataKeluarga->desa->nama_desa ?? 'N/A',
            $dataKeluarga->kecamatan_id,
            $dataKeluarga->kecamatan->nama_kecamatan ?? 'N/A',
            $dataKeluarga->nama_pengisi_id, // ID of PerangkatDesa
            
            // Kepala Keluarga Details
            $kepalaKeluarga->nik ?? '',
            $kepalaKeluarga->no_akta_kelahiran ?? '',
            $kepalaKeluarga->jenis_kelamin ?? '',
            $kepalaKeluarga->hubungan_keluarga_id ?? '',
            $kepalaKeluarga->hubunganKeluarga->nama ?? '',
            $kepalaKeluarga->tempat_lahir ?? '',
            $kepalaKeluarga->tanggal_lahir ?? '',
            $kepalaKeluarga->tanggal_pencatatan ?? '',
            $kepalaKeluarga->status_perkawinan ?? '',
            $kepalaKeluarga->agama_id ?? '',
            $kepalaKeluarga->agama->agama ?? '',
            $kepalaKeluarga->golongan_darah_id ?? '',
            $kepalaKeluarga->golonganDarah->golongan_darah ?? '',
            $kepalaKeluarga->kewarganegaraan_id ?? '',
            $kepalaKeluarga->kewarganegaraan->kewarganegaraan ?? '',
            $kepalaKeluarga->etnis ?? '',
            $kepalaKeluarga->pendidikan_id ?? '',
            $kepalaKeluarga->pendidikan->pendidikan ?? '',
            $kepalaKeluarga->mata_pencaharian_id ?? '',
            $kepalaKeluarga->mataPencaharian->mata_pencaharian ?? '',
            $kepalaKeluarga->kb_id ?? '',
            $kepalaKeluarga->kb->kb ?? '',
            $kepalaKeluarga->cacat_id ?? '',
            $kepalaKeluarga->cacat->tipe ?? '',
            $kepalaKeluarga->nama_cacat ?? '',
            $kepalaKeluarga->kedudukan_pajak_id ?? '',
            $kepalaKeluarga->kedudukanPajak->kedudukan_pajak ?? '',
            $kepalaKeluarga->lembaga_id ?? '',
            $kepalaKeluarga->lembaga->jenis_lembaga ?? '',
            $kepalaKeluarga->nama_lembaga ?? '',
            $kepalaKeluarga->nama_orang_tua ?? '',
        ];
    }
}