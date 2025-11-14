<?php

namespace App\Http\Controllers;

use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\AnggotaKeluarga;
use App\Models\DataKeluarga;
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
        // Asumsi: Variabel $idKepalaKeluarga sudah diambil seperti di DataKeluargaController
        $kepalaKeluargaRelasi = HubunganKeluarga::where('nama', 'Kepala Keluarga')->first();
        $idKepalaKeluarga = optional($kepalaKeluargaRelasi)->id;

        // Filter utama (whereHas): Pastikan hanya DataKeluarga yang memiliki anggota aktif yang dimuat
        $query = DataKeluarga::whereHas('anggotaKeluarga', function ($q) {
            $q->where('status_kehidupan', 'hidup');
        });

        if ($idKepalaKeluarga) {
            // Filter tambahan: Pastikan Kepala Keluarga (KK) sendiri juga berstatus aktif/hidup
            $query->whereHas('anggotaKeluarga', function ($q) use ($idKepalaKeluarga) {
                $q->where('status_kehidupan', 'hidup')
                    ->where('hubungan_keluarga_id', $idKepalaKeluarga);
            });
        }

        // Memuat relasi (with): FILTER relasi Anggota Keluarga agar hanya memuat yang 'hidup'
        $dataKeluargas = $query->with([
            'anggotaKeluarga' => function ($q) {
                // FILTER KRITIS: Hanya muat anggota yang berstatus 'hidup'
                $q->where('status_kehidupan', 'hidup');
            },
            'desas',
            'kecamatans',
            'perangkatDesas'
        ])->get();

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
        $anggotaKeluargas = $dataKeluarga->anggotaKeluarga()
            ->where('status_kehidupan', 'hidup')
            ->with([
                'agama',
                'golonganDarah',
                'kewarganegaraan',
                'pendidikan',
                'mataPencaharian',
                'kb',
                'cacat',
                'kedudukanPajak',
                'lembaga',
                'hubunganKeluarga',
                'datakeluarga'
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
        $hubunganKeluarga = HubunganKeluarga::all(); // Corrected variable name
        $agama = Agama::all();
        $golonganDarah = GolonganDarah::all();
        $kewarganegaraan = Kewarganegaraan::all();
        $pendidikan = Pendidikan::all();
        $mataPencaharians = MataPencaharian::all(); // This is the variable name you want to use
        $kb = KB::all();
        $cacat = Cacat::all();
        $kedudukanPajak = KedudukanPajak::all();
        $lembaga = Lembaga::all();

        return view('pages.anggota_keluarga.create', compact(
            'dataKeluarga',
            'hubunganKeluarga',
            'agama',
            'golonganDarah',
            'kewarganegaraan',
            'pendidikan',
            'mataPencaharians', // Corrected variable name here
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
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'hubungan_keluarga_id' => 'nullable|exists:hubungan_keluarga,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'tanggal_pencatatan' => 'nullable|date',
            'status_perkawinan' => 'nullable|string|max:255',
            'agama_id' => 'nullable|exists:agama,id',
            'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
            'kewarganegaraan_id' => 'nullable|exists:kewarganegaraans,id',
            'etnis' => 'nullable|string|max:255',
            'pendidikan_id' => 'nullable|exists:pendidikans,id',
            'mata_pencaharian_id' => 'nullable|exists:mata_pencaharians,id',
            'nama_orang_tua' => 'nullable|string|max:255',
            'kb_id' => 'nullable|exists:kb,id',
            'cacat_id' => 'nullable|exists:cacats,id',
            'nama_cacat' => 'nullable|string|max:255',
            'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
            'lembaga_id' => 'nullable|exists:lembagas,id',
            'nama_lembaga' => 'nullable|string|max:255',
        ]);

        // Handle Cacat logic
        if ($validatedData['nama_cacat'] && $validatedData['cacat_id']) {
            // Find the Cacat type based on the selected ID
            $selectedCacat = Cacat::find($validatedData['cacat_id']);

            if ($selectedCacat) {
                // Create a new Cacat record with the selected type and the specified name
                $newCacat = Cacat::firstOrCreate(
                    ['tipe' => $selectedCacat->tipe, 'nama_cacat' => $validatedData['nama_cacat']]
                );
                $validatedData['cacat_id'] = $newCacat->id;
            }
        } else {
            // If nama_cacat is empty, set cacat_id to null
            $validatedData['cacat_id'] = null;
        }
        // Handle Lembaga logic
        if ($validatedData['nama_lembaga'] && $validatedData['lembaga_id']) {
            // Find the Lembaga based on the selected ID
            $selectedLembaga = Lembaga::find($validatedData['lembaga_id']);

            if ($selectedLembaga) {
                // Create a new Lembaga record with the specified name
                $newLembaga = Lembaga::firstOrCreate(
                    ['nama_lembaga' => $validatedData['nama_lembaga']]
                );
                $validatedData['lembaga_id'] = $newLembaga->id;
            }
        } else {
            // If nama_lembaga is empty, set lembaga_id to null
            $validatedData['lembaga_id'] = null;
        }
        // Remove the temporary fields before creating the AnggotaKeluarga record
        unset($validatedData['nama_cacat']);
        unset($validatedData['nama_lembaga']);
        $validatedData['status_kehidupan'] = 'hidup';
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

    public function edit(AnggotaKeluarga $anggota_keluarga)
    {
        // Muat relasi yang diperlukan untuk form
        $anggota_keluarga->load(['datakeluarga', 'cacat', 'lembaga']);

        // Ambil semua data master untuk dropdown
        $hubunganKeluarga = HubunganKeluarga::all();
        $agama = Agama::all();
        $golonganDarah = GolonganDarah::all();
        $kewarganegaraan = Kewarganegaraan::all();
        $pendidikan = Pendidikan::all();
        $mataPencaharians = MataPencaharian::all();
        $kb = Kb::all();
        $cacat = Cacat::all();
        $kedudukanPajak = KedudukanPajak::all();
        $lembaga = Lembaga::all();

        // Mengirim data anggota keluarga dan data master ke view
        return view('pages.anggota_keluarga.edit', compact(
            'anggota_keluarga',
            'hubunganKeluarga',
            'agama',
            'golonganDarah',
            'kewarganegaraan',
            'pendidikan',
            'mataPencaharians',
            'kb',
            'cacat',
            'kedudukanPajak',
            'lembaga'
        ));
    }


    public function update(Request $request, AnggotaKeluarga $anggota_keluarga)
    {
        $validatedData = $request->validate([
            'data_keluarga_id' => 'required|exists:data_keluargas,id',
            'no_urut' => 'nullable|integer',
            // Aturan validasi nik diubah untuk mengabaikan id yang sedang diedit
            'nik' => ['required', 'string', 'max:255', Rule::unique('anggota_keluargas', 'nik')->ignore($anggota_keluarga->id)],
            'no_akta_kelahiran' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'hubungan_keluarga_id' => 'nullable|exists:hubungan_keluarga,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'tanggal_pencatatan' => 'nullable|date',
            'status_perkawinan' => 'nullable|string|max:255',
            'agama_id' => 'nullable|exists:agama,id',
            'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
            'kewarganegaraan_id' => 'nullable|exists:kewarganegaraans,id',
            'etnis' => 'nullable|string|max:255',
            'pendidikan_id' => 'nullable|exists:pendidikans,id',
            'mata_pencaharian_id' => 'nullable|exists:mata_pencaharians,id',
            'nama_orang_tua' => 'nullable|string|max:255',
            'kb_id' => 'nullable|exists:kb,id',
            'cacat_id' => 'nullable|exists:cacats,id',
            'nama_cacat' => 'nullable|string|max:255',
            'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
            'lembaga_id' => 'nullable|exists:lembagas,id',
            'nama_lembaga' => 'nullable|string|max:255',
        ]);

        // Handle Cacat logic
        if ($validatedData['nama_cacat'] && $validatedData['cacat_id']) {
            $selectedCacat = Cacat::find($validatedData['cacat_id']);
            if ($selectedCacat) {
                $newCacat = Cacat::firstOrCreate(
                    ['tipe' => $selectedCacat->tipe, 'nama_cacat' => $validatedData['nama_cacat']]
                );
                $validatedData['cacat_id'] = $newCacat->id;
            }
        } else {
            $validatedData['cacat_id'] = null;
        }

        // Handle Lembaga logic
        if ($validatedData['nama_lembaga'] && $validatedData['lembaga_id']) {
            $selectedLembaga = Lembaga::find($validatedData['lembaga_id']);
            if ($selectedLembaga) {
                $newLembaga = Lembaga::firstOrCreate(
                    ['jenis_lembaga' => $selectedLembaga->jenis_lembaga, 'nama_lembaga' => $validatedData['nama_lembaga']]
                );
                $validatedData['lembaga_id'] = $newLembaga->id;
            }
        } else {
            $validatedData['lembaga_id'] = null;
        }

        // Hapus field temporary
        unset($validatedData['nama_cacat']);
        unset($validatedData['nama_lembaga']);

        $anggota_keluarga->update($validatedData);

        return redirect()->route('anggota_keluarga.show', $anggota_keluarga->data_keluarga_id)->with('success', 'Data anggota keluarga berhasil diperbarui.');
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

    // get data anggota keluarga by data keluarga id

    public function get_data($id)
    {
        try {
            $anggota = AnggotaKeluarga::with([
                'datakeluarga',
                'hubunganKeluarga',
                'agama',
                'golonganDarah',
                'kewarganegaraan',
                'pendidikan',
                'mataPencaharian',
                'kb',
                'cacat',
                'kedudukanPajak',
                'lembaga',
            ])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $anggota
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data anggota keluarga tidak ditemukan.'
            ], 404);
        }
    }
}
