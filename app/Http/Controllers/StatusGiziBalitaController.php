<?php

namespace App\Http\Controllers;

use App\Models\StatusGiziBalita;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusGiziBalitaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id'); // Ambil ID desa dari session login
        $giziBalita = StatusGiziBalita::with('desa')
            ->where('desa_id', $desaId)
            ->latest()
            ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.gizi-balita.index', compact('giziBalita'));
    }

    public function create()
    {
        // Tidak perlu kirim $desas karena dropdown desa tidak ditampilkan
        return view('pages.perkembangan.kesehatan-masyarakat.gizi-balita.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'bergizi_buruk' => 'required|numeric|min:0',
            'bergizi_baik' => 'required|numeric|min:0',
            'bergizi_kurang' => 'required|numeric|min:0',
            'bergizi_lebih' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data status gizi balita.');
        }

        $jumlah_balita = $request->bergizi_buruk + $request->bergizi_baik + $request->bergizi_kurang + $request->bergizi_lebih;

        $data = $request->all();
        $data['desa_id'] = session('desa_id');   
        StatusGiziBalita::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.gizi-balita.index')
            ->with('success', 'Data status gizi balita berhasil ditambahkan.');
    }

    public function edit(StatusGiziBalita $statusGiziBalitum)
    {
        // Tidak perlu kirim $desas karena desa otomatis dari session
        return view('pages.perkembangan.kesehatan-masyarakat.gizi-balita.edit', [
            'data' => $statusGiziBalitum
        ]);
    }

 public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'tanggal' => 'required|date',
        'bergizi_buruk' => 'required|numeric|min:0',
        'bergizi_baik' => 'required|numeric|min:0',
        'bergizi_kurang' => 'required|numeric|min:0',
        'bergizi_lebih' => 'required|numeric|min:0',
        'jumlah_balita' => 'required|numeric|min:0',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Gagal memperbarui data status gizi balita.');
    }

    $data = $request->all();
    $data['desa_id'] = session('desa_id'); 

    $statusGiziBalita = StatusGiziBalita::findOrFail($id);
    $statusGiziBalita->update($data);

    return redirect()
        ->route('perkembangan.kesehatan-masyarakat.gizi-balita.index')
        ->with('success', 'Data status gizi balita berhasil diperbarui.');
}
  public function destroy($id)
{
    $data = StatusGiziBalita::findOrFail($id);
    $data->delete();

    return redirect()
        ->route('perkembangan.kesehatan-masyarakat.gizi-balita.index')
        ->with('success', 'Data status gizi balita berhasil dihapus.');
}

 public function show($id)
{
    // Ambil data berdasarkan id dari model StatusGiziBalita
    $data = StatusGiziBalita::findOrFail($id);

    // Kirim ke view
    return view('pages.perkembangan.kesehatan-masyarakat.gizi-balita.show', compact('data'));
}

}
