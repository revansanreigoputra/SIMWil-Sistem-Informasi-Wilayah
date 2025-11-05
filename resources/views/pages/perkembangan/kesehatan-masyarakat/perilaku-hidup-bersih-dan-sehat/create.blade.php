@extends('layouts.master')

@section('title', 'Tambah Perilaku Hidup Bersih dan Sehat')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-4"><strong>TAMBAH PERILAKU HIDUP BERSIH DAN SEHAT</strong></h5>

        <form action="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.store') }}" method="POST">
            @csrf

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Tanggal *</strong></td>
                        <td><input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga memiliki WC yang sehat</td>
                        <td><input type="number" name="keluarga_wc_sehat" class="form-control" value="{{ old('keluarga_wc_sehat') }}"></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga memiliki WC yang kurang memenuhi standar kesehatan</td>
                        <td><input type="number" name="keluarga_wc_tidak_standar" class="form-control" value="{{ old('keluarga_wc_tidak_standar') }}"></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga biasa buang air besar di sungai/parit/kebun/hutan</td>
                        <td><input type="number" name="keluarga_buang_air_sungai" class="form-control" value="{{ old('keluarga_buang_air_sungai') }}"></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga yang menggunakan fasilitas MCK umum</td>
                        <td><input type="number" name="keluarga_mck_umum" class="form-control" value="{{ old('keluarga_mck_umum') }}"></td>
                    </tr>

                    <tr><td colspan="2"><strong>Kebiasaan Penduduk dalam Makan</strong></td></tr>
                    <tr>
                        <td>Kebiasaan penduduk makan dalam sehari 1 kali</td>
                        <td>
                            <label><input type="radio" name="makan_1x" value="Ada"> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_1x" value="Tidak Ada"> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebiasaan penduduk makan sehari 2 kali</td>
                        <td>
                            <label><input type="radio" name="makan_2x" value="Ada"> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_2x" value="Tidak Ada"> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebiasaan penduduk makan sehari 3 kali</td>
                        <td>
                            <label><input type="radio" name="makan_3x" value="Ada"> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_3x" value="Tidak Ada"> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebiasaan penduduk makan sehari lebih dari 3 kali</td>
                        <td>
                            <label><input type="radio" name="makan_lebih_3x" value="Ada"> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_lebih_3x" value="Tidak Ada"> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Penduduk yang belum tentu sehari makan 1 kali</td>
                        <td>
                            <label><input type="radio" name="belum_tentu_makan" value="Ada"> Ada</label>
                            <label class="ms-3"><input type="radio" name="belum_tentu_makan" value="Tidak Ada"> Tidak Ada</label>
                        </td>
                    </tr>

                    <tr><td colspan="2"><strong>Tempat Berobat Keluarga</strong></td></tr>
                    <tr>
                        <td>Dukun Terlatih</td>
                        <td>
                            <label><input type="radio" name="dukun_terlatih" value="Tidak Ada"> Tidak Ada</label>
                            <label class="ms-3"><input type="radio" name="dukun_terlatih" value="Sedikit"> Sedikit</label>
                            <label class="ms-3"><input type="radio" name="dukun_terlatih" value="Banyak"> Banyak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Dokter/puskesmas/mantri/bidan/posyandu</td>
                        <td>
                            <label><input type="radio" name="tenaga_kesehatan" value="Tidak Ada"> Tidak Ada</label>
                            <label class="ms-3"><input type="radio" name="tenaga_kesehatan" value="Sedikit"> Sedikit</label>
                            <label class="ms-3"><input type="radio" name="tenaga_kesehatan" value="Banyak"> Banyak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Obat tradisional dari dukun pengobatan alternatif</td>
                        <td>
                            <label><input type="radio" name="obat_tradisional_dukun" value="Tidak Ada"> Tidak Ada</label>
                            <label class="ms-3"><input type="radio" name="obat_tradisional_dukun" value="Sedikit"> Sedikit</label>
                            <label class="ms-3"><input type="radio" name="obat_tradisional_dukun" value="Banyak"> Banyak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Paranormal</td>
                        <td>
                            <label><input type="radio" name="paranormal" value="Tidak Ada"> Tidak Ada</label>
                            <label class="ms-3"><input type="radio" name="paranormal" value="Sedikit"> Sedikit</label>
                            <label class="ms-3"><input type="radio" name="paranormal" value="Banyak"> Banyak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Obat tradisional dari keluarga sendiri</td>
                        <td>
                            <label><input type="radio" name="obat_keluarga_sendiri" value="Tidak Ada"> Tidak Ada</label>
                            <label class="ms-3"><input type="radio" name="obat_keluarga_sendiri" value="Sedikit"> Sedikit</label>
                            <label class="ms-3"><input type="radio" name="obat_keluarga_sendiri" value="Banyak"> Banyak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Tidak diobati</td>
                        <td>
                            <label><input type="radio" name="tidak_diobati" value="Tidak Ada"> Tidak Ada</label>
                            <label class="ms-3"><input type="radio" name="tidak_diobati" value="Sedikit"> Sedikit</label>
                            <label class="ms-3"><input type="radio" name="tidak_diobati" value="Banyak"> Banyak</label>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p><em>* Field yang wajib diisi</em></p>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index') }}" class="btn btn-warning text-white">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
