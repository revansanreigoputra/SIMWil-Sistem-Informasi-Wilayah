<?php

namespace App\Http\Controllers;

use App\Models\SektorJasaUsaha;
use App\Models\MasterDDK\MataPencaharian; // Asumsi model MataPencaharian sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorJasaUsahaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        // Ambil data sektor jasa usaha di desa tertentu, diurutkan terbaru, dengan relasi
        $data = SektorJasaUsaha::with(['desa', 'mataPencaharian'])
                    ->where('desa_id', $desaId)
                    ->latest() 
                    ->paginate(10);
        
        // Ambil data mata pencaharian untuk modal tambah/edit (sesuai pola index industri besar)
        $mataPencaharians = MataPencaharian::all();

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index', compact('data', 'mataPencaharians'));
    }

    // Untuk modal create, tidak perlu method terpisah jika menggunakan modal di index
    // public function create() 
    // {
    //     // ...
    // }

   public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            // Perbaikan di sini: Ganti 'mata_pencahariansas' menjadi 'mata_pencaharians'
            'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id', 
            'jumlah' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data sektor jasa usaha.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $data['jumlah'] = $data['jumlah'] ?? 0; // Pastikan jumlah default 0

        SektorJasaUsaha::create($data);

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index')
            ->with('success', 'Data Sektor Jasa Usaha berhasil ditambahkan.');
    }

    public function show(SektorJasaUsaha $sektorJasaUsaha) // Menggunakan Route Model Binding
    {
        // Pastikan relasi di-load
        $sektorJasaUsaha->load(['desa', 'mataPencaharian']); 
        
        // Cek desa_id
        if ($sektorJasaUsaha->desa_id !== session('desa_id')) {
            abort(403, 'Akses ditolak.'); // Atau redirect dengan pesan error
        }

        return view('pages.perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.show', compact('sektorJasaUsaha'));
    }

    public function edit(SektorJasaUsaha $sektorJasaUsaha)
    {
        // Tidak perlu karena menggunakan modal di index (sesuai pola industri besar)
        // return view('pages.perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.edit', compact('sektorJasaUsaha'));
    }

   public function update(Request $request, SektorJasaUsaha $sektorJasaUsaha)
{
    $validator = Validator::make($request->all(), [
        'tanggal' => 'required|date',
        // PERBAIKAN: Ganti 'mata_pencahariansas' menjadi 'mata_pencaharians'
        'mata_pencaharian_id' => 'required|exists:mata_pencaharians,id', 
        'jumlah' => 'nullable|integer|min:0',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Gagal memperbarui data sektor jasa usaha.');
    }

    $data = $request->all();
    // Desa ID tidak perlu diupdate karena diasumsikan data ini hanya milik desa tertentu
    // $data['desa_id'] = session('desa_id'); 
    $data['jumlah'] = $data['jumlah'] ?? 0;

    $sektorJasaUsaha->update($data);

    return redirect()
        ->route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index')
        ->with('success', 'Data Sektor Jasa Usaha berhasil diperbarui.');
}

    public function destroy(SektorJasaUsaha $sektorJasaUsaha)
    {
        $sektorJasaUsaha->delete();

        return redirect()
            ->route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index')
            ->with('success', 'Data Sektor Jasa Usaha berhasil dihapus.');
    }
}