<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\DataKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MasterDDK\{
    Agama,
    GolonganDarah,
    Kewarganegaraan,
    Pendidikan,
    MataPencaharian,
    KB,
    Cacat,
    KedudukanPajak,
    Lembaga,
    HubunganKeluarga
};

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a list of all Data Keluarga (Heads of Family).
     * This will be the landing page to select a family.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dataKeluargas = DataKeluarga::with(['anggotaKeluarga', 'desas', 'kecamatans', 'perangkatDesas'])->get();

        return view('pages.anggota_keluarga.index', compact('dataKeluargas'));
    }

    /**
     * Display a specific Data Keluarga and its members.
     *
     * @param  \App\Models\DataKeluarga  $dataKeluarga
     * @return \Illuminate\View\View
     */
    public function showAnggota(DataKeluarga $dataKeluarga)
    {
        $anggotaKeluargas = $dataKeluarga->anggotaKeluarga()->with([
            'agama',
            'golonganDarah',
            'kewarganegaraan',
            'pendidikan',
            'mataPencaharian',
            'kb',
            'cacat',
            'kedudukanPajak',
            'lembaga'
        ])->get();

        return view('pages.anggota_keluarga.show_anggota', compact('dataKeluarga', 'anggotaKeluargas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $dataKeluarga = null;
        $dataKeluargaId = $request->input('data_keluarga_id');

        if ($dataKeluargaId) {
            $dataKeluarga = DataKeluarga::find($dataKeluargaId);
        }
        // Load relationships data for dropdowns
        $hubunganKeluargas = HubunganKeluarga::all(); 
        $agama = Agama::all();
        $golonganDarah = GolonganDarah::all();
        $kewarganegaraan = Kewarganegaraan::all();
        $pendidikan = Pendidikan::all();
        $mataPencaharian = MataPencaharian::all();
        $kb = KB::all();
        $cacat = Cacat::all();
        $kedudukanPajak = KedudukanPajak::all();
        $lembaga = Lembaga::all();

        return view('pages.anggota_keluarga.create', compact(

            'dataKeluarga',
            'hubunganKeluargas',
            'agama',
            'golonganDarah',
            'kewarganegaraan',
            'pendidikan',
            'mataPencaharian',
            'kb',
            'cacat',
            'kedudukanPajak',
            'lembaga'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data_keluarga_id' => 'required|exists:data_keluargas,id',
            'no_urut' => 'nullable|integer',
            'nik' => 'required|string|unique:anggota_keluargas,nik|max:255',
            'no_akta_kelahiran' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:1',
            'hubungan_keluarga_id' => 'nullable|exists:hubungan_keluargas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'tanggal_pencatatan' => 'nullable|date',
            'status_perkawinan' => 'nullable|string|max:255',
            'agama_id' => 'nullable|exists:agamas,id',
            'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
            'kewarganegaraan_id' => 'nullable|exists:kewarganegaraans,id',
            'etnis' => 'nullable|string|max:255',
            'pendidikan_id' => 'nullable|exists:pendidikans,id',
            'mata_pencaharian_id' => 'nullable|exists:mata_pencarians,id',
            'nama_orang_tua' => 'nullable|string|max:255',
            'kb_id' => 'nullable|exists:k_b_s,id',
            'cacat_id' => 'nullable|exists:cacats,id',
            'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
            'lembaga_id' => 'nullable|exists:lembagas,id',
        ]);

        AnggotaKeluarga::create($validatedData);

        return redirect()->route('anggota_keluarga.index')->with('success', 'Anggota keluarga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaKeluarga  $anggotaKeluarga
     * @return \Illuminate\View\View
     */
    public function show(AnggotaKeluarga $anggotaKeluarga)
    {
        return view('anggota_keluarga.show', compact('anggotaKeluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaKeluarga  $anggotaKeluarga
     * @return \Illuminate\View\View
     */
    public function edit(AnggotaKeluarga $anggotaKeluarga)
    {
        // Load relationships data for dropdowns
        $agama = Agama::all();
        $golonganDarah = GolonganDarah::all();
        $kewarganegaraan = Kewarganegaraan::all();
        $pendidikan = Pendidikan::all();
        $mataPencaharian = MataPencaharian::all();
        $kb = KB::all();
        $cacat = Cacat::all();
        $kedudukanPajak = KedudukanPajak::all();
        $lembaga = Lembaga::all();

        return view('anggota_keluarga.edit', compact(
            'anggotaKeluarga',
            'agama',
            'golonganDarah',
            'kewarganegaraan',
            'pendidikan',
            'mataPencaharian',
            'kb',
            'cacat',
            'kedudukanPajak',
            'lembaga'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaKeluarga  $anggotaKeluarga
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, AnggotaKeluarga $anggotaKeluarga)
    {
        $validatedData = $request->validate([
            'data_keluarga_id' => 'required|exists:data_keluargas,id',
            'no_urut' => 'nullable|integer',
            'nik' => 'required|string|unique:anggota_keluargas,nik,' . $anggotaKeluarga->id . '|max:255',
            'no_akta_kelahiran' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:1',
            'hubungan_keluarga_id' => 'nullable|exists:hubungan_keluargas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'tanggal_pencatatan' => 'nullable|date',
            'status_perkawinan' => 'nullable|string|max:255',
            'agama_id' => 'nullable|exists:agamas,id',
            'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
            'kewarganegaraan_id' => 'nullable|exists:kewarganegaraans,id',
            'etnis' => 'nullable|string|max:255',
            'pendidikan_id' => 'nullable|exists:pendidikans,id',
            'mata_pencaharian_id' => 'nullable|exists:mata_pencarians,id',
            'nama_orang_tua' => 'nullable|string|max:255',
            'kb_id' => 'nullable|exists:k_b_s,id',
            'cacat_id' => 'nullable|exists:cacats,id',
            'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
            'lembaga_id' => 'nullable|exists:lembagas,id',
        ]);

        $anggotaKeluarga->update($validatedData);

        return redirect()->route('anggota_keluarga.index')->with('success', 'Anggota keluarga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaKeluarga  $anggotaKeluarga
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AnggotaKeluarga $anggotaKeluarga)
    {
        $anggotaKeluarga->delete();

        return redirect()->route('anggota_keluarga.index')->with('success', 'Anggota keluarga berhasil dihapus.');
    }
}
