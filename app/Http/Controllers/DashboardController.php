<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\DataKeluarga;
use App\Models\AnggotaKeluarga;
use App\Models\MasterDDK\Agama;
use App\Models\LayananSurat\Permohonan;
use App\Models\LayananSurat\KopTemplate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

final class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request): View
    {
        $totalKecamatan = Kecamatan::count();
        $totalDesa = Desa::count();
        $totalKeluarga = DataKeluarga::count();
        $totalPenduduk = AnggotaKeluarga::count();

        try {
            $pengajuanTerakhir = Permohonan::with('anggotaKeluarga', 'kopTemplate')
                ->latest()
                ->take(3)
                ->get();
        } catch (\Exception $e) {

            $pengajuanTerakhir = collect();

        }

        $genderData = AnggotaKeluarga::select(
            'jenis_kelamin',
            DB::raw('COUNT(*) as total')
        )
            ->whereNotNull('jenis_kelamin')
            ->groupBy('jenis_kelamin')
            ->get();

        $genderLabels = $genderData->pluck('jenis_kelamin')->toArray();
        $genderSeries = $genderData->pluck('total')->toArray();

        $agamaData = AnggotaKeluarga::join('agama', 'anggota_keluargas.agama_id', '=', 'agama.id')
            ->select('agama.agama as nama_agama', DB::raw('COUNT(anggota_keluargas.id) as total'))
            ->whereNotNull('anggota_keluargas.agama_id')
            ->groupBy('agama.agama')
            ->orderBy('total', 'desc')
            ->get();

        $agamaLabels = $agamaData->pluck('nama_agama')->toArray();
        $agamaSeries = $agamaData->pluck('total')->toArray();

        $umurData = AnggotaKeluarga::select(
            DB::raw("
                CASE
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 5 THEN '0-5'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 7 THEN '5-7'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 13 THEN '7-13'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 16 THEN '13-16'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 19 THEN '16-19'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 23 THEN '19-23'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 30 THEN '23-30'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 40 THEN '30-40'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 56 THEN '40-56'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 65 THEN '56-65'
                    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 75 THEN '65-75'
                    ELSE '>75'
                END as kelompok_umur
            "),
            DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
            DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END) as laki_laki")
        )
            ->whereNotNull('tanggal_lahir')
            ->groupBy('kelompok_umur')
            ->orderByRaw("FIELD(kelompok_umur, '0-5', '5-7', '7-13', '13-16', '16-19', '19-23', '23-30', '30-40', '40-56', '56-65', '65-75', '>75')")
            ->get();

        $umurLabels = $umurData->pluck('kelompok_umur')->toArray();
        $umurSeriesPerempuan = $umurData->pluck('perempuan')->toArray();
        $umurSeriesLaki = $umurData->pluck('laki_laki')->toArray();

        return view('pages.dashboard', [
            'totalKecamatan' => $totalKecamatan,
            'totalDesa' => $totalDesa,
            'totalKeluarga' => $totalKeluarga,
            'totalPenduduk' => $totalPenduduk,

            'pengajuanTerakhir' => $pengajuanTerakhir,

            'genderLabels' => $genderLabels,
            'genderSeries' => $genderSeries,

            'agamaLabels' => $agamaLabels,
            'agamaSeries' => $agamaSeries,

            'umurLabels' => $umurLabels,
            'umurSeriesPerempuan' => $umurSeriesPerempuan,
            'umurSeriesLaki' => $umurSeriesLaki,
        ]);
    }
}
