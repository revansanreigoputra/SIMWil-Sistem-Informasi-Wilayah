<?php

namespace App\Http\Controllers\LayananSurat;

use Illuminate\Support\Facades\View;
use App\Models\LayananSurat\{
    Permohonan,
    KopTemplate,
    JenisSurat,
};
use App\Models\{
    DataKeluarga,
    AnggotaKeluarga,
    Ttd,
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermohonanSuratController extends Controller
{
    public function index()
    {

        $jenisSurats = JenisSurat::all();
        // --- DEBUG CHECK ---
        if ($jenisSurats->isEmpty()) {
            dd("JenisSurat is empty! Please add data to the database.");
        }
        $permohonans = Permohonan::with(['kopTemplate', 'jenisSurat', 'dataKeluarga', 'anggotaKeluarga', 'ttd'])->get();
        return view('pages.layanan.permohonan.index', compact('permohonans', 'jenisSurats'));
    }

    public function create(Request $request)
    {
        $kopTemplates = KopTemplate::all();
        $allJenisSurats = JenisSurat::all();
        $dataKeluargas = DataKeluarga::all();
        $anggotaKeluargas = AnggotaKeluarga::all();
        $ttds = Ttd::all();


        return view('pages.layanan.permohonan.create', [
            'kopTemplates' => $kopTemplates,
            'jenisSurats' => $allJenisSurats,
            'dataKeluargas' => $dataKeluargas,
            'anggotaKeluargas' => $anggotaKeluargas,
            'ttds' => $ttds,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_kop_templates' => 'required|exists:kop_templates,id',
            'id_jenis_surats' => 'required|exists:jenis_surats,id',
            'id_data_keluargas' => 'nullable|exists:data_keluargas,id',
            'id_anggota_keluargas' => 'nullable|exists:anggota_keluargas,id',
            'id_ttds' => 'required|exists:ttds,id',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_permohonan' => 'required|date',
        ]);

        Permohonan::create($request->all());

        return redirect()->route('permohonan_surats.index')->with('success', 'Permohonan Surat berhasil dibuat.');
    }
    public function getForm($jenisSuratId)
    {
        try {
            $jenisSurat = JenisSurat::findOrFail($jenisSuratId);
            $specificFormView = 'pages.layanan.permohonan.forms.' . $jenisSurat->kode;

            // Ensure the view exists before trying to render
            if (!View::exists($specificFormView)) {
                return response()->json(['html' => '<div>Formulir tidak ditemukan untuk kode: ' . $jenisSurat->kode . '</div>'], 404);
            }

            // Render the partial Blade view and return its HTML
            $html = view($specificFormView, compact('jenisSurat'))->render();

            return response()->json(['html' => $html, 'nama' => $jenisSurat->nama, 'kode' => $jenisSurat->kode]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['html' => '<div>Jenis Surat tidak valid.</div>'], 404);
        } catch (\Exception $e) {
            return response()->json(['html' => '<div>Terjadi kesalahan saat memuat formulir.</div>'], 500);
        }
    }
}
