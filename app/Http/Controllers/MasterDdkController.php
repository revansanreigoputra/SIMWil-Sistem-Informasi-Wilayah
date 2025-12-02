<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\MasterDDK\{
    Agama,
    Cacat,
    GolonganDarah,
    HubunganKeluarga,
    KB,
    KedudukanPajak,
    Kewarganegaraan,
    Lembaga,
    MataPencaharian,
    Pendidikan,
    TenagaKerja,
    KualitasAngkatanKerja
};

class MasterDdkController extends Controller
{
    private $models = [
        'agama' => Agama::class,
        'cacat' => Cacat::class,
        'golongandarah' => GolonganDarah::class,
        'hubungankeluarga' => HubunganKeluarga::class,
        'kb' => KB::class,
        'kedudukanpajak' => KedudukanPajak::class,
        'kewarganegaraan' => Kewarganegaraan::class,
        'lembaga' => Lembaga::class,
        'matapencaharian' => MataPencaharian::class,
        'pendidikan' => Pendidikan::class,
        'tenagakerja' => TenagaKerja::class,
        'kualitasangkatankerja' => KualitasAngkatanKerja::class,
    ];

    public function index(Request $request, string $table = 'agama')
    {
        // Get the model class based on the URL parameter, default to 'agama' if not provided
        $modelClass = $this->models[Str::lower($table)] ?? null;

        if (!$modelClass) {
            // Handle invalid table names
            return redirect()->route('master-ddk.index', ['table' => 'agama'])->with('error', 'Tabel tidak ditemukan.');
        }

        // Fetch data for the selected table
        $data = $modelClass::all();

        // Prepare a user-friendly table name for the view title
        $tableName = Str::headline($table);

        // Pass the active table name to the view
        $activeTable = $table;

        return view('pages.master-ddk.index', compact('data', 'tableName', 'activeTable'));
    }
    public function create(string $table)
    {
        if (!isset($this->models[$table])) {
            abort(404);
        }
        return view('pages.master-ddk.create', ['activeTable' => $table]);
    }

    // BARU: Method untuk menyimpan data baru
    public function store(Request $request, string $table)
    {
        $modelClass = $this->models[$table] ?? null;
        if (!$modelClass) {
            abort(404);
        }

        $data = $this->prepareAndValidateData($request, $table);

        $modelClass::create($data); // Menggunakan create yang lebih ringkas

        return redirect()->route('master.ddk.index', ['table' => $table])
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    // BARU: Method untuk menampilkan form edit
    public function edit(string $table, int $id)
    {
        $modelClass = $this->models[$table] ?? null;
        if (!$modelClass) {
            abort(404);
        }

        $item = $modelClass::findOrFail($id);

        return view('pages.master-ddk.edit', [
            'item' => $item,
            'activeTable' => $table,
        ]);
    }

    // BARU: Method untuk mengupdate data
    public function update(Request $request, string $table, int $id)
    {
        $modelClass = $this->models[$table] ?? null;
        if (!$modelClass) {
            abort(404);
        }

        $item = $modelClass::findOrFail($id);
        $data = $this->prepareAndValidateData($request, $table, $item);

        $item->update($data);

        return redirect()->route('master.ddk.index', ['table' => $table])
                         ->with('success', 'Data berhasil diperbarui.');
    }

    // BARU: Method untuk menghapus data
    public function destroy(string $table, int $id)
    {
        $modelClass = $this->models[$table] ?? null;
        if (!$modelClass) {
            abort(404);
        }

        $item = $modelClass::findOrFail($id);
        $item->delete();

        return redirect()->route('master.ddk.index', ['table' => $table])
                         ->with('success', 'Data berhasil dihapus.');
    }

    // BARU: Helper method untuk validasi & menyiapkan data
    private function prepareAndValidateData(Request $request, string $table, $item = null)
    {
        $rules = [];
        $data = [];

        // Logika dinamis untuk validasi dan nama kolom
        switch ($table) {
            case 'lembaga':
                $rules = [
                    'jenis_lembaga' => 'required|string|max:255',
                    'nama_lembaga' => 'required|string|max:255',
                 ];
                $data = $request->only(['jenis_lembaga', 'nama_lembaga']);
                break;
            case 'cacat':
                 $rules = [
                    'tipe' => 'required|string|max:255',
                    'nama_cacat' => 'required|string|max:255',
                ];
                $data = $request->only(['tipe', 'nama_cacat']);
                break;
            // Untuk tabel-tabel yang hanya punya satu kolom nama unik
            case 'agama':
                $rules = ['agama' => 'required|string|max:255'];
                $data  = $request->only(['agama']);
                break;

            case 'pendidikan':
                $rules = ['pendidikan' => 'required|string|max:255'];
                $data  = $request->only(['pendidikan']);
                break;

            case 'kb':
                $rules = ['kb' => 'required|string|max:255'];
                $data  = $request->only(['kb']);
                break;

            case 'golongandarah':
                $rules = ['golongan_darah' => 'required|string|max:255'];
                $data  = $request->only(['golongan_darah']);
            break;

            case 'hubungankeluarga':
                $rules = ['hubungan_keluarga' => 'required|string|max:255'];
                $data  = $request->only(['hubungan_keluarga']);
                break;
            case 'kedudukanpajak':
                $rules = ['kedudukan_pajak' => 'required|string|max:255'];
                $data  = $request->only(['kedudukan_pajak']);
                break;
            case 'matapencaharian':
                $rules = [
                    'mata_pencaharian' => 'required|string|max:255',
                    'keterangan'       => 'nullable|string'
                ];
                $data = [
                    'mata_pencaharian' => $request->mata_pencaharian,
                    'keterangan'       => $request->keterangan ?? ''
                ];
                break;

            case 'kewarganegaraan':
            case 'tenagakerja':
            case 'kualitasangkatankerja':
                // Mengambil nama kolom dari model jika ada, jika tidak default ke nama tabel
                $column = (new $this->models[$table])->getFillable()[0] ?? $table;
                $rules = [$column => 'required|string|max:255'];
                $data = $request->only([$column]);
                break;
            // Default untuk tabel-tabel dengan kolom 'nama'
            default:
                $rules = ['nama' => 'required|string|max:255'];
                $data = $request->only(['nama']);
                break;
        }

        $request->validate($rules);
        return $data;
    }
}
