<?php

namespace App\Http\Controllers\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate; // Import Coordinate

class DataKeluargaTemplateExport implements WithHeadings, WithEvents
{
    // Kolom-kolom yang harus memiliki dropdown
    private $dropdownColumns = [
        // Indeks kolom (dimulai dari 0) => Nama Tabel/Array Data
        12 => ['Laki-laki', 'Perempuan'], 
        18 => ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'], 
        
        // PASTIKAN NAMA TABEL TEPAT SESUAI DATABASE (e.g., 'agamas' jamak, bukan 'agama' tunggal)
        19 => 'agama', 
        21 => 'golongan_darahs',
        23 => 'kewarganegaraans',
        26 => 'pendidikans',
        28 => 'mata_pencaharians', // Saya asumsikan nama tabel Anda adalah jamak
        30 => 'kb',
        32 => 'cacats',
        35 => 'kedudukan_pajaks',
        5 => 'desas', 
    ];

    // MAPPING BARU: Nama Tabel => Nama Kolom yang akan diambil nilainya (pluck)
    private $tableColumnMap = [
        'agama' => 'agama', // Tabel 'agamas', kolom 'agama'
        'golongan_darahs' => 'golongan_darah',
        'kewarganegaraans' => 'kewarganegaraan',
        'pendidikans' => 'pendidikan',
        'mata_pencaharians' => 'mata_pencaharian',
        'kb' => 'kb',
        'cacats' => 'tipe', // Asumsi kolom display di tabel cacats adalah 'tipe'
        'kedudukan_pajaks' => 'kedudukan_pajak',
        'desas' => 'nama_desa',
    ];


    public function headings(): array
    {
        // Pastikan DataKeluargaExport di-import jika berada di namespace yang berbeda
        return (new DataKeluargaExport())->headings();
    }
    
    // --- IMPLEMENTASI WITH EVENTS ---
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $sheet = $event->sheet->getDelegate();
                
                $dataStartRow = 2; 
                $maxRows = 1000;
                
                foreach ($this->dropdownColumns as $colIndex => $source) {
                    
                    // Konversi indeks kolom (0-based) menjadi nama kolom Excel (A, B, C...)
                    $columnLetter = Coordinate::stringFromColumnIndex($colIndex + 1);

                    // Ambil data sumber
                    if (is_array($source)) {
                        // Sumber array statis
                        $dropdownList = implode(',', $source);
                    } else {
                        // Sumber dari database (Pastikan Anda menggunakan $this->tableColumnMap)
                        
                        // FIX UTAMA: Ambil nama kolom yang benar dari map berdasarkan NAMA TABEL ($source)
                        $columnToPluck = $this->tableColumnMap[$source] ?? 'nama'; 
                        
                        // Ambil data dari database
                        $tableData = DB::table($source)
                                        ->pluck($columnToPluck) // Menggunakan kolom yang sudah dipetakan
                                        ->filter() // Hapus nilai null/kosong
                                        ->map(function($item) {
                                            // Escape koma jika ada di nama data
                                            return str_replace(',', '\,', $item); 
                                        })
                                        ->toArray();
                        
                        $dropdownList = implode(',', $tableData);
                    }

                    // Hanya buat validasi jika ada data
                    if (!empty($dropdownList)) {
                        // Kloning DataValidation dari cell header untuk diterapkan ke range
                        $validation = $sheet->getCell("{$columnLetter}1")->getDataValidation();
                        $validation->setType(DataValidation::TYPE_LIST);
                        $validation->setErrorStyle(DataValidation::STYLE_STOP); // Ganti ke STYLE_STOP agar lebih ketat
                        $validation->setShowDropDown(true);
                        $validation->setAllowBlank(true);
                        
                        // Atur data sumber dropdown. MAX 255 karakter!
                        $validation->setFormula1("\"$dropdownList\"");

                        // Terapkan validasi ke range
                        for ($i = $dataStartRow; $i <= $maxRows; $i++) {
                            $sheet->getCell("{$columnLetter}{$i}")->setDataValidation(clone $validation);
                        }
                    }
                }
            },
        ];
    }
}