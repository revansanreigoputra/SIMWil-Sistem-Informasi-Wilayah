<?php

namespace App\Http\Controllers\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate; // 
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\{Alignment, Border, Fill, NumberFormat};

class DataKeluargaTemplateImport implements WithHeadings, WithEvents, ShouldAutoSize, WithStyles
{
    // Kolom-kolom yang harus memiliki dropdown
    private $dropdownColumns = [
        // Indeks kolom (dimulai dari 0) => Nama Tabel/Array Data
        10 => ['Laki-laki', 'Perempuan'],
        11 => ['Kepala Keluarga'],
        15 => ['Menikah', 'Belum Menikah', 'Cerai'],

        // PASTIKAN NAMA TABEL TEPAT SESUAI DATABASE (e.g., 'agamas' jamak, bukan 'agama' tunggal)
        16 => 'agama',
        17 => 'golongan_darahs',
        18 => 'kewarganegaraans',
        20 => 'pendidikans',
        21 => 'mata_pencaharians', // Saya asumsikan nama tabel Anda adalah jamak
        22 => 'kb',
        23 => 'cacats',
        25 => 'kedudukan_pajaks',
        26 => 'lembagas',
        5 => 'desas',
        6 => 'kecamatans',
        7 => 'perangkat_desas',


    ];

    // MAPPING BARU: Nama Tabel => Nama Kolom yang akan diambil nilainya (pluck)
    private $tableColumnMap = [
        'agama' => 'agama', // Tabel 'agamas', kolom 'agama'
        'hubungan_keluarga' => 'nama',
        'golongan_darahs' => 'golongan_darah',
        'kewarganegaraans' => 'kewarganegaraan',
        'pendidikans' => 'pendidikan',
        'mata_pencaharians' => 'mata_pencaharian',
        'kb' => 'kb',
        'cacats' => 'tipe', // Asumsi kolom display di tabel cacats adalah 'tipe'
        'kedudukan_pajaks' => 'kedudukan_pajak',
        'desas' => 'nama_desa',
        'kecamatans' => 'nama_kecamatan',
        'perangkat_desas' => 'nama',
        'lembagas' => 'nama_lembaga',
    ];


    public function headings(): array
    {


        return (new DataKeluargaExport())->headings();
    }

    // Implementasi method required by WithStyles
    public function styles(Worksheet $sheet)
    {


        // 3️⃣: Tambahkan border dari A1 sampai kolom terakhir (misalnya C10)
        $sheet->getStyle('A1:AC10')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        return [
            1 => ['font' => ['bold' => true]], // tetap biar header bold juga
        ];
    }

    // Assuming necessary use statements (AfterSheet, Coordinate, DataValidation, Fill, etc.) are present.

    public function registerEvents(): array
    {
        // Define a sufficiently large range for the dropdowns
        $maxDropdownRows = 1000;

        // DEFINE THE FULL LIST OF REQUIRED COLUMNS (Used for styling the RED header cells)
        // NOTE: These letters MUST accurately reflect ALL required columns, including those without dropdowns.
        $requiredColumnLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'U', 'V', 'AC'];


        return [
            AfterSheet::class => function (AfterSheet $event) use ($maxDropdownRows, $requiredColumnLetters) {

                $sheet = $event->sheet->getDelegate();
                $headerRange = 'A1:' . $sheet->getHighestColumn() . '1';
                $dataStartRow = 2;
                $contentRange = 'A2:' . $sheet->getHighestColumn() . $sheet->getHighestRow();

                // --- 1. INITIAL STYLING PASS (Sets Blue Base Color) ---
                $baseHeaderStyle = [
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['argb' => 'FFADD8E6']], // Light Blue
                    'font' => ['color' => ['argb' => 'FF000000']], // Black Font
                ];
                $sheet->getStyle($headerRange)->applyFromArray($baseHeaderStyle);

                // --- 2. DROPDOWN VALIDATION PASS ---
                foreach ($this->dropdownColumns as $colIndex => $source) {

                    $columnLetter = Coordinate::stringFromColumnIndex($colIndex + 1);
                    $tableData = [];

                    // --- Data Retrieval Logic ---
                    if (is_array($source)) {
                        $tableData = $source;
                    } else {
                        $columnToPluck = $this->tableColumnMap[$source] ?? 'nama';
                        // Source from database
                        $tableData = DB::table($source)
                            ->distinct()
                            ->pluck($columnToPluck)
                            ->filter()
                            ->toArray();
                    }

                    // --- Dropdown List Preparation ---
                    $dropdownList = implode(',', array_map(function ($item) {
                        return str_replace(',', '\,', $item);
                    }, $tableData));


                    // 4. APPLY VALIDATION
                    if (!empty($dropdownList)) {
                        $validation = $sheet->getCell("{$columnLetter}{$dataStartRow}")->getDataValidation();
                        $validation->setType(DataValidation::TYPE_LIST);
                        $validation->setErrorStyle(DataValidation::STYLE_STOP);
                        $validation->setShowDropDown(true);
                        $validation->setAllowBlank(true);
                        $validation->setFormula1("\"$dropdownList\"");

                        // Apply validation to the entire required range
                        for ($i = $dataStartRow; $i <= $maxDropdownRows; $i++) {
                            $sheet->getCell("{$columnLetter}{$i}")->setDataValidation(clone $validation);
                        }
                    }
                }


                // --- 3. REQUIRED STYLING PASS (RED OVERRIDE) ---
                $requiredStyle = [
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['argb' => 'FFFF0000']], // Red Background
                    'font' => ['color' => ['argb' => 'FFFFFFFF']], // White Font
                ];

                foreach ($requiredColumnLetters as $col) {
                    $cell = $col . '1';
                    $value = $sheet->getCell($cell)->getValue();

                    // 1. Add Asterisk to Content
                    $sheet->setCellValue($cell, $value . '*');

                    // 2. Apply RED style override
                    $sheet->getStyle($cell)->applyFromArray($requiredStyle);
                }

                // --- 4. Final Layout ---
                // Apply Text Wrapping to All Data Cells (Row 2 onwards)
                $sheet->getStyle($contentRange)->getAlignment()->setWrapText(true);

                // AutoSize Columns again after final styling/wrapping
                foreach (range('A', $sheet->getHighestColumn()) as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
