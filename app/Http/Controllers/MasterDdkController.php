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
    Pendidikan
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
}