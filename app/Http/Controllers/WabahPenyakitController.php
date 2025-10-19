<?php
namespace App\Http\Controllers;

use App\Models\WabahPenyakit;
use App\Models\JenisWabah; 
use App\Models\Desa;
use Illuminate\Http\Request;

class WabahPenyakitController extends Controller
{
    
   public function index()
{
    $wabahPenyakit = WabahPenyakit::with(['jenisWabah', 'desa'])->orderBy('tanggal', 'desc')->get();
    $jenisWabah = JenisWabah::orderBy('nama')->get();
    $desas = Desa::orderBy('nama_desa')->get();

    return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.index', compact('wabahPenyakit', 'jenisWabah', 'desas'));
}

    public function create()
{
    $jenisWabah = JenisWabah::orderBy('nama')->get();
    $desas = Desa::orderBy('nama_desa')->get(); // 🔥 Tambahkan ini
    return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.create', compact('jenisWabah', 'desas'));
}

    public function store(Request $request)
    {
        $request->validate([
    'desa_id' => 'required|exists:desas,id',
    'tanggal' => 'required|date',
    'jenis_wabah_id' => 'required|exists:jenis_wabahs,id',
    'jumlah_kejadian_tahun_ini' => 'required|integer|min:0',
    'jumlah_meninggal' => 'required|integer|min:0',
]);

        try {
            WabahPenyakit::create($request->all());
            return redirect()->route('perkembangan.kesehatan-masyarakat.wabah-penyakit.index')
                ->with('success', 'Data wabah penyakit berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        $data = WabahPenyakit::with('jenisWabah')->findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.show', compact('data'));
    }

   public function edit($id)
{
    $data = WabahPenyakit::findOrFail($id);
    $jenisWabah = JenisWabah::orderBy('nama')->get();
    $desas = Desa::orderBy('nama_desa')->get(); // 🔥 Tambahkan ini
    return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.edit', compact('data', 'jenisWabah', 'desas'));
}

    public function update(Request $request, $id)
    {
       $request->validate([
    'desa_id' => 'required|exists:desas,id',
    'tanggal' => 'required|date',
    'jenis_wabah_id' => 'required|exists:jenis_wabahs,id',
    'jumlah_kejadian_tahun_ini' => 'required|integer|min:0',
    'jumlah_meninggal' => 'required|integer|min:0',
]);

        try {
            $wabahPenyakit = WabahPenyakit::findOrFail($id);
            $wabahPenyakit->update($request->all());
            return redirect()->route('perkembangan.kesehatan-masyarakat.wabah-penyakit.index')
                ->with('success', 'Data wabah penyakit berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $wabahPenyakit = WabahPenyakit::findOrFail($id);
            $wabahPenyakit->delete();
            return redirect()->route('perkembangan.kesehatan-masyarakat.wabah-penyakit.index')
                ->with('success', 'Data wabah penyakit berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
