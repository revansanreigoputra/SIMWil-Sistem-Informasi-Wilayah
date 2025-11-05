<?php

namespace App\Http\Controllers;

use App\Models\WabahPenyakit;
use App\Models\JenisWabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WabahPenyakitController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id'); // ambil dari session login

        $wabahPenyakit = WabahPenyakit::with(['jenisWabah', 'desa'])
            ->where('desa_id', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        $jenisWabah = JenisWabah::orderBy('nama')->get();

        return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.index', compact('wabahPenyakit', 'jenisWabah'));
    }

    public function create()
    {
        $jenisWabah = JenisWabah::orderBy('nama')->get();
        // Tidak perlu kirim $desas karena desa otomatis dari session
        return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.create', compact('jenisWabah'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_wabah_id' => 'required|exists:jenis_wabahs,id',
            'jumlah_kejadian_tahun_ini' => 'required|integer|min:0',
            'jumlah_meninggal' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data wabah penyakit.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // otomatis isi desa_id

        WabahPenyakit::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.wabah-penyakit.index')
            ->with('success', 'Data wabah penyakit berhasil ditambahkan.');
    }

   public function show($id)
{
    // Ambil data berdasarkan ID
    $data = WabahPenyakit::with('jenisWabah')->findOrFail($id);

    // Kirim data ke view
    return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.show', compact('data'));
}

    public function edit(WabahPenyakit $wabahPenyakit)
    {
        $jenisWabah = JenisWabah::orderBy('nama')->get();
        // desa tidak perlu dikirim karena sudah otomatis dari session
        return view('pages.perkembangan.kesehatan-masyarakat.wabah-penyakit.edit', compact('wabahPenyakit', 'jenisWabah'));
    }

    public function update(Request $request, WabahPenyakit $wabahPenyakit)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_wabah_id' => 'required|exists:jenis_wabahs,id',
            'jumlah_kejadian_tahun_ini' => 'required|integer|min:0',
            'jumlah_meninggal' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data wabah penyakit.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // otomatis isi ulang

        $wabahPenyakit->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.wabah-penyakit.index')
            ->with('success', 'Data wabah penyakit berhasil diperbarui.');
    }

    public function destroy(WabahPenyakit $wabahPenyakit)
    {
        $wabahPenyakit->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.wabah-penyakit.index')
            ->with('success', 'Data wabah penyakit berhasil dihapus.');
    }
}
