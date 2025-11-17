<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananSurat\JenisSurat;
use App\Models\LayananSurat\Permohonan;
use App\Models\AnggotaKeluarga;
use App\Models\MasterDDK\{
    Cacat,
    Agama,
    GolonganDarah,
    Kewarganegaraan,
    Pendidikan,
    MataPencaharian,
    KB,
    HubunganKeluarga
};
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermohonanSuratPublicController extends Controller
{
    public function indexPublicSurat()
    {

        $jenis_surat_shortcuts = JenisSurat::select('id', 'kode', 'nama', 'kop_template_id', 'mutasi_type')
            ->whereHas('kopTemplate', function ($query) {
                $query->where('jenis_kop', 'kop surat');
            })
            ->orderBy('kode', 'asc')
            ->get();

        return view('public.permohonanSurat.index', compact('jenis_surat_shortcuts'));
    }

    public function showNikVerification(JenisSurat $jenisSurat)
    {

        return view('public.permohonanSurat.verify_nik', compact('jenisSurat'));
    }


    public function processNikVerification(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|digits:16',
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
        ]);

        $nik = $request->nik;
        $jenisSuratId = $request->jenis_surat_id;


        $anggotaKeluarga = AnggotaKeluarga::where('nik', $nik)->first();
        $jenisSurat = JenisSurat::findOrFail($jenisSuratId);

        if (!$anggotaKeluarga) {
            return back()->withInput()->withErrors(['nik' => 'NIK tidak terdaftar. Silakan periksa kembali NIK Anda.']);
        }


        $request->session()->put('permohonan_data', [
            'anggota_keluarga_id' => $anggotaKeluarga->id,
            'nik' => $nik,
            'jenis_surat_id' => $jenisSuratId,
            'kop_template_id' => $jenisSurat->kop_template_id, // Get the KopTemplate ID
        ]);
        return redirect()->route('public.permohonanSurat.create');
    }

    private function convertToRoman($month)
    {
        $map = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];
        return $map[$month] ?? '';
    }



    public function showPermohonanForm(Request $request)
    {
        $sessionData = $request->session()->get('permohonan_data');

        if (!$sessionData) {
            return redirect()->route('public.permohonanSurat.index')->with('error', 'Sesi verifikasi NIK telah berakhir atau dilewati. Silakan ulangi.');
        }

        $anggotaKeluarga = AnggotaKeluarga::findOrFail($sessionData['anggota_keluarga_id']);

        $jenisSurat = JenisSurat::findOrFail($sessionData['jenis_surat_id']);

        if (is_string($jenisSurat->required_variables)) {

            $jenisSurat->required_variables = json_decode($jenisSurat->required_variables, true) ?? [];
        }
        $currentYear = Carbon::now()->year;
        $romanMonth = $this->convertToRoman(Carbon::now()->month);
        $defaultCode = $jenisSurat->kode ?? 'XXXX';

        $lastPermohonan = Permohonan::where('id_format_nomor_surats', $jenisSurat->id)
            ->where('tahun', $currentYear)
            ->orderBy('nomor_urut', 'desc')
            ->first();

        $nextNomorUrut = ($lastPermohonan->nomor_urut ?? 0) + 1;


        return view('public.permohonanSurat.create', compact(
            'anggotaKeluarga',
            'jenisSurat',
            'currentYear',
            'romanMonth',
            'defaultCode',
            'nextNomorUrut',
        ));
    }



    public function storePublicPermohonan(Request $request)
    {
        $validated = $request->validate([
            'id_format_nomor_surats' => 'required|exists:jenis_surats,id',
            'id_anggota_keluargas' => 'required|exists:anggota_keluargas,id',
            'id_kop_templates' => 'required|exists:kop_templates,id',
            'paragraf_pembuka' => 'required|string',
            'paragraf_penutup' => 'required|string',
            'email' => 'required|email:rfc,dns',
        ]);
        $idAnggotaKeluarga = $request->id_anggota_keluargas;
        $emailBaru = $request->email;

        // 2. 🛑 UPDATE/SIMPAN EMAIL ke tabel anggota_keluargas
        $anggotaKeluarga = AnggotaKeluarga::find($idAnggotaKeluarga);
        if ($anggotaKeluarga) {
            // Hanya update jika email yang diinput berbeda dengan yang tersimpan (atau jika sebelumnya null)
            if ($anggotaKeluarga->email !== $emailBaru) {
                $anggotaKeluarga->email = $emailBaru;
                $anggotaKeluarga->save();
            }
        }
        // 3. format nomor surat
        $jenisSurat = JenisSurat::findOrFail($request->id_format_nomor_surats);
        $currentYear = Carbon::now()->year;
        $romanMonth = $this->convertToRoman(Carbon::now()->month);

        // Recalculate next number to be safe (avoid race conditions in high traffic if possible, 
        // though for this level of app, this is usually sufficient)
        $lastPermohonan = Permohonan::where('id_format_nomor_surats', $jenisSurat->id)
            ->where('tahun', $currentYear)
            ->orderBy('nomor_urut', 'desc')
            ->lockForUpdate() // Optional: Add locking if you expect high concurrency
            ->first();

        $nextNomorUrut = ($lastPermohonan->nomor_urut ?? 0) + 1;

        $fullNomorSurat = sprintf(
            "%s/%s/%s/%s",
            str_pad($nextNomorUrut, 3, '0', STR_PAD_LEFT),
            $jenisSurat->kode,
            $romanMonth,
            $currentYear
        );
        $data = [
            'id_format_nomor_surats' => $request->id_format_nomor_surats,
            'id_anggota_keluargas' => $request->id_anggota_keluargas,
            'id_kop_templates' => $request->id_kop_templates,
            'custom_variables' => $request->custom_data ?? [],  // dynamic fields
            'paragraf_pembuka' => $request->paragraf_pembuka,
            'paragraf_penutup' => $request->paragraf_penutup,
            'status' => $request->status ?? 'belum_diverifikasi',
            'id_ttds' => $request->id_ttds ?? 1,
            'tanggal_permohonan' => Carbon::now(),
            'tahun' => $currentYear, 
            'nomor_surat' => $fullNomorSurat,
            'nomor_urut' => $nextNomorUrut,
        ];
        $permohonan = Permohonan::create($data);

        $idAnggotaKeluarga = $request->id_anggota_keluargas;
        $anggotaKeluarga = AnggotaKeluarga::find($idAnggotaKeluarga);


        if ($anggotaKeluarga) {
            $nikPemohon = $anggotaKeluarga->nik;

            return redirect()
                ->route('public.permohonanSurat.tracking_result', ['nik' => $nikPemohon])
                ->with('success', 'Permohonan surat berhasil dikirim dan menunggu verifikasi.');
        }

        return redirect()
            ->route('public.permohonanSurat.index')
            ->with('error', 'Permohonan berhasil disimpan, namun NIK pemohon tidak ditemukan untuk tracking.');
    }

    public function trackPublic(Request $request)
    {
        $nik = $request->query('nik');
        if (!$nik) {
            return redirect()->route('public.permohonanSurat.index')->with('error', 'NIK tidak ditemukan.');
        }

        $permohonans = Permohonan::with('jenisSurat')
            ->whereHas('anggotaKeluarga', function ($query) use ($nik) {
                $query->where('nik', $nik);
            })
            ->orderByDesc('created_at')
            ->get();


        return view('public.permohonanSurat.tracking_result', compact('permohonans', 'nik'));
    }
}
