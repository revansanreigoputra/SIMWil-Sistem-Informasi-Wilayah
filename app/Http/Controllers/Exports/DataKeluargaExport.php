<?php

namespace App\Http\Controllers\Exports;

use App\Models\DataKeluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\{Alignment, Border, Fill, NumberFormat};

class DataKeluargaExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Eager load relationships for efficiency
        return DataKeluarga::with([
            'desas',
            'kecamatans',
            'perangkatDesas',
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
            'NAMA_DESA',
            'NAMA_KECAMATAN',
            'NAMA_PENGISI',
            'NIK_KEPALA_KELUARGA',
            'NO_AKTA_KELAHIRAN',
            'JENIS_KELAMIN',
            'NAMA_HUBUNGAN_KELUARGA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'TANGGAL_PENCATATAN',
            'STATUS_PERKAWINAN',
            'NAMA_AGAMA',
            'NAMA_GOLONGAN_DARAH',
            'NAMA_KEWARGANEGARAAN',
            'ETNIS',
            'NAMA_PENDIDIKAN',
            'NAMA_MATA_PENCAHARIAN',
            'NAMA_KB',
            'NAMA_TIPE_CACAT',
            'NAMA_CACAT_DETAIL',
            'NAMA_KEDUDUKAN_PAJAK',
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
        $forceText = function ($value) {
            // Pastikan nilainya ada, lalu tambahkan tanda kutip tunggal di awal
            return $value ? "'" . (string) $value : '';
        };

        return [
            $forceText($dataKeluarga->no_kk),
            $dataKeluarga->kepala_keluarga, // Name from DataKeluarga
            $dataKeluarga->alamat,
            $dataKeluarga->rt,
            $dataKeluarga->rw,
            $dataKeluarga->desas->nama_desa ?? 'N/A',
            $dataKeluarga->kecamatans->nama_kecamatan ?? 'N/A',
            $dataKeluarga->perangkatDesas->nama ?? 'N/A',

            // Kepala Keluarga Details
            $forceText($kepalaKeluarga->nik ?? ''),
            $forceText($kepalaKeluarga->no_akta_kelahiran ?? ''),
            $kepalaKeluarga->jenis_kelamin ?? '',
            $kepalaKeluarga->hubunganKeluarga->nama ?? '',
            $kepalaKeluarga->tempat_lahir ?? '',
            $kepalaKeluarga->tanggal_lahir ?? '',
            $kepalaKeluarga->tanggal_pencatatan ?? '',
            $kepalaKeluarga->status_perkawinan ?? '',
            $kepalaKeluarga->agama->agama ?? '',
            $kepalaKeluarga->golonganDarah->golongan_darah ?? '',
            $kepalaKeluarga->kewarganegaraan->kewarganegaraan ?? '',
            $kepalaKeluarga->etnis ?? '',
            $kepalaKeluarga->pendidikan->pendidikan ?? '',
            $kepalaKeluarga->mataPencaharian->mata_pencaharian ?? '',
            $kepalaKeluarga->kb->kb ?? '',
            $kepalaKeluarga->cacat->tipe ?? '',
            $kepalaKeluarga->nama_cacat ?? '',
            $kepalaKeluarga->kedudukanPajak->kedudukan_pajak ?? '',
            $kepalaKeluarga->lembaga->jenis_lembaga ?? '',
            $kepalaKeluarga->nama_lembaga ?? '',
            $kepalaKeluarga->nama_orang_tua ?? '',
        ];
    }
    /**
     * Tentukan gaya untuk worksheet (opsional, tetapi direkomendasikan).
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Baris pertama (Header)
            1    => [
                'font' => [
                    'bold' => true, // Membuat teks tebal
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER, // Rata tengah
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN, // Tambahkan border tipis
                    ],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FFE0E0E0', // Warna abu-abu terang
                    ],
                ],
            ],
            // Contoh: Membuat kolom 'NO_KK' (Kolom A) menjadi format teks untuk menjaga digit
            'A' => [
                'numberFormat' => [
                    'formatCode' => NumberFormat::FORMAT_TEXT,
                ],
            ],
            'I' => [
                'numberFormat' => [
                    'formatCode' => NumberFormat::FORMAT_TEXT,
                ],
            ],
            // Contoh: Membuat kolom 'NIK_KEPALA_KELUARGA' (Kolom K) menjadi format teks
            'J' => [
                'numberFormat' => [
                    'formatCode' => NumberFormat::FORMAT_TEXT,
                ],
            ],
        ];
    }
}
