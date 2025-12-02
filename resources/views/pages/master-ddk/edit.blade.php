@extends('layouts.master')

@section('title', 'Edit ' . Str::headline($activeTable))

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Data {{ Str::headline($activeTable) }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('master.ddk.update', ['table' => $activeTable, 'id' => $item->id]) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Form dinamis --}}
                @if ($activeTable == 'lembaga')
                    <div class="mb-3">
                        <label class="form-label">Jenis Lembaga</label>
                        <select class="form-control" name="jenis_lembaga" required>
                            <option value="pemerintahan" {{ $item->lembaga == 'pemerintahan' ? 'selected' : '' }}>
                                Pemerintahan</option>
                            <option value="kemasyarakatan" {{ $item->lembaga == 'kemasyarakatan' ? 'selected' : '' }}>
                                Kemasyarakatan</option>
                            <option value="ekonomi" {{ $item->lembaga == 'ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lembaga</label>
                        <input type="text" class="form-control" name="nama_lembaga" value="{{ $item->nama_lembaga }}"
                            required>
                    </div>
                @elseif ($activeTable == 'cacat')
                    <div class="mb-3">
                        <label class="form-label">Tipe</label>
                        <input type="text" class="form-control" name="tipe" value="{{ $item->tipe }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Cacat</label>
                        <input type="text" class="form-control" name="nama_cacat" value="{{ $item->nama_cacat }}"
                            required>
                    </div>
                @elseif ($activeTable == 'agama')
                    <div class="mb-3">
                        <label class="form-label">Nama Agama</label>
                        <input type="text" class="form-control" name="agama" value="{{ $item->agama }}" required>
                    </div>
                @elseif ($activeTable == 'pendidikan')
                    <div class="mb-3">
                        <label class="form-label">Nama Pendidikan</label>
                        <input type="text" class="form-control" name="pendidikan" value="{{ $item->pendidikan }}"
                            required>
                    </div>
                @elseif ($activeTable == 'kb')
                    <div class="mb-3">
                        <label class="form-label">KB</label>
                        <input type="text" class="form-control" name="kb" value="{{ $item->kb }}" required>
                    </div>
                @elseif ($activeTable == 'hubungankeluarga')
                    <div class="mb-3">
                        <label class="form-label">Hubungan Keluarga</label>
                        <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" required>
                    </div>
                @elseif ($activeTable == 'kedudukanpajak')
                    <div class="mb-3">
                        <label class="form-label">Kedudukan Pajak</label>
                        <input type="text" class="form-control" name="kedudukan_pajak"
                            value="{{ $item->kedudukan_pajak }}" required>
                    </div>

                    {{-- FIXED: dipindah ke sini, tidak setelah @endif --}}
                @elseif ($activeTable == 'golongandarah')
                    <div class="mb-3">
                        <label class="form-label">Golongan Darah</label>
                        <input type="text" class="form-control" name="golongan_darah"
                            value="{{ $item->golongan_darah }}" required>
                    </div>
                @elseif ($activeTable == 'kewarganegaraan')
                    <div class="mb-3">
                        <label class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control" name="kewarganegaraan"
                            value="{{ $item->kewarganegaraan }}" required>
                    </div>
                @elseif ($activeTable == 'matapencaharian')
                    <div class="mb-3">
                        <label class="form-label">Mata Pencaharian</label>
                        <input type="text" class="form-control" name="mata_pencaharian"
                            value="{{ $item->mata_pencaharian }}" required>
                    </div>
                @elseif ($activeTable == 'tenagakerja')
                    <div class="mb-3">
                        <label for="tenaga_kerja" class="form-label">Nama Tenaga Kerja</label>
                        <input type="text" class="form-control" id="tenaga_kerja" name="tenaga_kerja"
                            value="{{ $item->tenaga_kerja }}" required>
                    </div>
                @elseif ($activeTable == 'kualitasangkatankerja')
                    <div class="mb-3">
                        <label for="kualitas_angkatan_kerja" class="form-label">Kualitas Angkatan Kerja</label>
                        <input type="text" class="form-control" id="kualitas_angkatan_kerja" name="kualitas_angkatan_kerja"
                            value="{{ $item->kualitas_angkatan_kerja }}" required>
                    </div>
                @else
                    {{-- Default --}}
                    @php
                        $columnName = array_keys((array) $item)[1];
                    @endphp
                    <div class="mb-3">
                        <label class="form-label">Nama {{ Str::headline($activeTable) }}</label>
                        <input type="text" class="form-control" name="nama" value="{{ $item->{$columnName} }}"
                            required>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('master.ddk.index', ['table' => $activeTable]) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
