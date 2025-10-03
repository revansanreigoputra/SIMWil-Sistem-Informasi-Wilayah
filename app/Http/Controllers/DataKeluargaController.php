<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{
    AnggotaKeluarga,
    Desa,
    PerangkatDesa,
    Kecamatan,
    DataKeluarga
};
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

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKeluargas = DataKeluarga::with(['desas', 'kecamatans', 'perangkatDesas'])->get();
        return view('pages.data_keluarga.index', compact('dataKeluargas'));
    }

    public function create()
    {
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
        $desas = Desa::all();
        $kecamatans = Kecamatan::all();
        $perangkatDesas = PerangkatDesa::all();
        return view('pages.data_keluarga.create', compact(
            'desas',
            'kecamatans',
            'perangkatDesas',
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

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'no_kk' => 'required|string|unique:data_keluargas,no_kk',
            'kepala_keluarga' => 'required|string', // Name of the head
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'desa_id' => 'required|exists:desas,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama_pengisi_id' => 'required|exists:perangkat_desas,id',

            // New fields for Kepala Keluarga
            'nik' => 'nullable|string|size:16|unique:anggota_keluargas,nik',
            'no_akta_kelahiran' => 'nullable|string',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'hubungan_keluarga_id' => 'nullable|exists:hubungan_keluarga,id',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'tanggal_pencatatan' => 'nullable|date',
            'status_perkawinan' => 'nullable|in:Belum Menikah,Menikah,Cerai,Cerai Mati',
            'agama_id' => 'nullable|exists:agama,id',
            'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
            'kewarganegaraan_id' => 'nullable|exists:kewarganegaraans,id',
            'etnis' => 'nullable|string',
            'pendidikan_id' => 'nullable|exists:pendidikans,id',
            'mata_pencaharian_id' => 'nullable|exists:mata_pencaharians,id',
            'kb_id' => 'nullable|exists:kb,id',
            'cacat_id' => 'nullable|exists:cacats,id',
            'nama_cacat' => 'nullable|string',
            'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
            'lembaga_id' => 'nullable|exists:lembagas,id',
            'nama_lembaga' => 'nullable|string',
        ]);
        $dataKeluargaData = $request->only([
            'no_kk',
            'kepala_keluarga',
            'alamat',
            'rt',
            'rw',
            'desa_id',
            'kecamatan_id',
            'nama_pengisi_id'
        ]);
        $anggotaKeluargaData = $request->only([
            'nik',
            'no_akta_kelahiran',
            'jenis_kelamin',
            'hubungan_keluarga_id',
            'tempat_lahir',
            'tanggal_lahir',
            'tanggal_pencatatan',
            'status_perkawinan',
            'agama_id',
            'golongan_darah_id',
            'kewarganegaraan_id',
            'nama_orang_tua',
            'etnis',
            'pendidikan_id',
            'mata_pencaharian_id',
            'kb_id',
            'cacat_id',
            'nama_cacat',
            'kedudukan_pajak_id',
            'lembaga_id',
            'nama_lembaga'
        ]);

        $dataKeluarga = DataKeluarga::create($dataKeluargaData);
        $anggotaKeluargaData['data_keluarga_id'] = $dataKeluarga->id;
        $anggotaKeluargaData['no_urut'] = 1; // Always 1 for the Head of Household
        $anggotaKeluargaData['nama'] = $dataKeluarga->kepala_keluarga; // Use the name from the family data
        AnggotaKeluarga::create($anggotaKeluargaData);
        return redirect()->route('data_keluarga.index')->with('success', 'Data Kepala Keluarga berhasil ditambahkan.');
    }

    public function edit(DataKeluarga $dataKeluarga)
    {
        // 1. Get the Head of Household record (AnggotaKeluarga)
        // Assuming the Head of Household is the first member (no_urut = 1)
        $kepalaKeluarga = $dataKeluarga->anggotaKeluarga()->where('no_urut', 1)->firstOrFail();

        // 2. Load all dropdown data
        $desas = Desa::all();
        $kecamatans = Kecamatan::all();
        $perangkatDesas = PerangkatDesa::all();
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

        // 3. Pass data to the view
        return view('pages.data_keluarga.edit', compact(
            'dataKeluarga',
            'kepalaKeluarga',
            'desas',
            'kecamatans',
            'perangkatDesas',
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
public function update(Request $request, DataKeluarga $dataKeluarga)
{
    
    $kepalaKeluarga = $dataKeluarga->anggotaKeluarga()->where('no_urut', 1)->firstOrFail();

    $validatedData = $request->validate([
        'no_kk' => 'required|string|unique:data_keluargas,no_kk,' . $dataKeluarga->id,
        'kepala_keluarga' => 'required|string',
        'alamat' => 'required|string',
        'rt' => 'required|string',
        'rw' => 'required|string',
        'desa_id' => 'required|exists:desas,id',
        'kecamatan_id' => 'required|exists:kecamatans,id',
        'nama_pengisi_id' => 'required|exists:perangkat_desas,id',
 
        'nik' => 'nullable|string|size:16|unique:anggota_keluargas,nik,' . $kepalaKeluarga->id,
        'no_akta_kelahiran' => 'nullable|string',
        'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        'hubungan_keluarga_id' => 'nullable|exists:hubungan_keluarga,id',
        'tempat_lahir' => 'nullable|string',
        'tanggal_lahir' => 'nullable|date',
        'tanggal_pencatatan' => 'nullable|date',
        'status_perkawinan' => 'nullable|in:Belum Menikah,Menikah,Cerai,Cerai Mati',
        'agama_id' => 'nullable|exists:agama,id',
        'golongan_darah_id' => 'nullable|exists:golongan_darahs,id',
        'kewarganegaraan_id' => 'nullable|exists:kewarganegaraans,id',
        'etnis' => 'nullable|string',
        'pendidikan_id' => 'nullable|exists:pendidikans,id',
        'mata_pencaharian_id' => 'nullable|exists:mata_pencaharians,id',
        'nama_orang_tua' => 'nullable|string',  
        'kb_id' => 'nullable|exists:kb,id',
        'cacat_id' => 'nullable|exists:cacats,id',
        'nama_cacat' => 'nullable|string',
        'kedudukan_pajak_id' => 'nullable|exists:kedudukan_pajaks,id',
        'lembaga_id' => 'nullable|exists:lembagas,id',
        'nama_lembaga' => 'nullable|string',
    ]);

   
    $dataKeluargaData = $request->only([
        'no_kk', 'kepala_keluarga', 'alamat', 'rt', 'rw', 'desa_id', 'kecamatan_id', 'nama_pengisi_id'
    ]);
    
    $anggotaKeluargaData = $request->only([
        'nik', 'no_akta_kelahiran', 'jenis_kelamin', 'hubungan_keluarga_id',
        'tempat_lahir', 'tanggal_lahir', 'tanggal_pencatatan', 'status_perkawinan',
        'agama_id', 'golongan_darah_id', 'kewarganegaraan_id', 'etnis',
        'pendidikan_id', 'mata_pencaharian_id', 'nama_orang_tua', 'kb_id', 'cacat_id', 
        'nama_cacat', 'kedudukan_pajak_id', 'lembaga_id', 'nama_lembaga'
    ]);

   
    $dataKeluarga->update($dataKeluargaData);

  
    $anggotaKeluargaData['nama'] = $dataKeluargaData['kepala_keluarga']; // Ensure member name matches new family head name
    $anggotaKeluargaData['no_urut'] = 1; 

    $kepalaKeluarga->update($anggotaKeluargaData);

    return redirect()->route('data_keluarga.index')->with('success', 'Data Keluarga dan Kepala Keluarga berhasil diperbarui.');
}

 
public function destroy(DataKeluarga $dataKeluarga)
{
    // Delete all associated AnggotaKeluarga records first
    $dataKeluarga->anggotaKeluarga()->delete(); 
    $dataKeluarga->delete();

    return redirect()->route('data_keluarga.index')->with('success', 'Data Keluarga dan seluruh anggotanya berhasil dihapus.');
}

}