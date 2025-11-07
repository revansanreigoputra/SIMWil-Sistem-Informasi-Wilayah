@extends('layouts.master')

@section('title', 'Edit Perilaku Hidup Bersih dan Sehat')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-4"><strong>EDIT PERILAKU HIDUP BERSIH DAN SEHAT</strong></h5>

        <form action="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Tanggal *</strong></td>
                        <td><input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $data->tanggal) }}" required></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga memiliki WC yang sehat</td>
                        <td><input type="number" name="keluarga_wc_sehat" class="form-control" value="{{ old('keluarga_wc_sehat', $data->keluarga_wc_sehat) }}"></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga memiliki WC yang kurang memenuhi standar kesehatan</td>
                        <td><input type="number" name="keluarga_wc_tidak_standar" class="form-control" value="{{ old('keluarga_wc_tidak_standar', $data->keluarga_wc_tidak_standar) }}"></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga biasa buang air besar di sungai/parit/kebun/hutan</td>
                        <td><input type="number" name="keluarga_buang_air_sungai" class="form-control" value="{{ old('keluarga_buang_air_sungai', $data->keluarga_buang_air_sungai) }}"></td>
                    </tr>
                    <tr>
                        <td>Jumlah keluarga yang menggunakan fasilitas MCK umum</td>
                        <td><input type="number" name="keluarga_mck_umum" class="form-control" value="{{ old('keluarga_mck_umum', $data->keluarga_mck_umum) }}"></td>
                    </tr>

                    <tr><td colspan="2"><strong>Kebiasaan Penduduk dalam Makan</strong></td></tr>
                    <tr>
                        <td>Kebiasaan penduduk makan dalam sehari 1 kali</td>
                        <td>
                            <label><input type="radio" name="makan_1x" value="Ada" {{ old('makan_1x', $data->makan_1x) == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_1x" value="Tidak Ada" {{ old('makan_1x', $data->makan_1x) == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebiasaan penduduk makan sehari 2 kali</td>
                        <td>
                            <label><input type="radio" name="makan_2x" value="Ada" {{ old('makan_2x', $data->makan_2x) == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_2x" value="Tidak Ada" {{ old('makan_2x', $data->makan_2x) == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebiasaan penduduk makan sehari 3 kali</td>
                        <td>
                            <label><input type="radio" name="makan_3x" value="Ada" {{ old('makan_3x', $data->makan_3x) == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_3x" value="Tidak Ada" {{ old('makan_3x', $data->makan_3x) == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebiasaan penduduk makan sehari lebih dari 3 kali</td>
                        <td>
                            <label><input type="radio" name="makan_lebih_3x" value="Ada" {{ old('makan_lebih_3x', $data->makan_lebih_3x) == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label class="ms-3"><input type="radio" name="makan_lebih_3x" value="Tidak Ada" {{ old('makan_lebih_3x', $data->makan_lebih_3x) == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Penduduk yang belum tentu sehari makan 1 kali</td>
                        <td>
                            <label><input type="radio" name="belum_tentu_makan" value="Ada" {{ old('belum_tentu_makan', $data->belum_tentu_makan) == 'Ada' ? 'checked' : '' }}> Ada</label>
                            <label class="ms-3"><input type="radio" name="belum_tentu_makan" value="Tidak Ada" {{ old('belum_tentu_makan', $data->belum_tentu_makan) == 'Tidak Ada' ? 'checked' : '' }}> Tidak Ada</label>
                        </td>
                    </tr>

                    <tr><td colspan="2"><strong>Tempat Berobat Keluarga</strong></td></tr>
                    @php
                        $kategori = ['Tidak Ada', 'Sedikit', 'Banyak'];
                    @endphp
                    <tr>
                        <td>Dukun Terlatih</td>
                        <td>
                            @foreach($kategori as $k)
                                <label class="me-3"><input type="radio" name="dukun_terlatih" value="{{ $k }}" {{ old('dukun_terlatih', $data->dukun_terlatih) == $k ? 'checked' : '' }}> {{ $k }}</label>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Dokter/puskesmas/mantri/bidan/posyandu</td>
                        <td>
                            @foreach($kategori as $k)
                                <label class="me-3"><input type="radio" name="tenaga_kesehatan" value="{{ $k }}" {{ old('tenaga_kesehatan', $data->tenaga_kesehatan) == $k ? 'checked' : '' }}> {{ $k }}</label>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Obat tradisional dari dukun pengobatan alternatif</td>
                        <td>
                            @foreach($kategori as $k)
                                <label class="me-3"><input type="radio" name="obat_tradisional_dukun" value="{{ $k }}" {{ old('obat_tradisional_dukun', $data->obat_tradisional_dukun) == $k ? 'checked' : '' }}> {{ $k }}</label>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Paranormal</td>
                        <td>
                            @foreach($kategori as $k)
                                <label class="me-3"><input type="radio" name="paranormal" value="{{ $k }}" {{ old('paranormal', $data->paranormal) == $k ? 'checked' : '' }}> {{ $k }}</label>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Obat tradisional dari keluarga sendiri</td>
                        <td>
                            @foreach($kategori as $k)
                                <label class="me-3"><input type="radio" name="obat_keluarga_sendiri" value="{{ $k }}" {{ old('obat_keluarga_sendiri', $data->obat_keluarga_sendiri) == $k ? 'checked' : '' }}> {{ $k }}</label>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Tidak diobati</td>
                        <td>
                            @foreach($kategori as $k)
                                <label class="me-3"><input type="radio" name="tidak_diobati" value="{{ $k }}" {{ old('tidak_diobati', $data->tidak_diobati) == $k ? 'checked' : '' }}> {{ $k }}</label>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>

            <p><em>* Field yang wajib diisi</em></p>

            <div class="mt-3">
                <button type="submit" class="btn btn-warning text-white">Perbarui</button>
                <a href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
