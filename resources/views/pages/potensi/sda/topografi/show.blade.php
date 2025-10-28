@extends('layouts.master')

@section('title', 'Detail Data Topografi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-mountain me-2"></i>
                Detail Data Topografi
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $topografi->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $topografi->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Bentangan Wilayah (Ha)</h6>
            <div class="row">
                @php
                    $bentangan_wilayah = [
                        'Dataran Rendah' => 'dataran_rendah',
                        'Berbukit-bukit' => 'berbukit_bukit',
                        'Dataran' => 'dataran',
                        'Lereng Gunung' => 'lereng_gunung',
                        'Tepi Pantai/Pesisir' => 'tepi_pantai_pesisir',
                        'Kawasan Rawa' => 'kawasan_rawa',
                        'Kawasan Gambut' => 'kawasan_gambut',
                        'Aliran Sungai' => 'aliran_sungai',
                        'Bantaran Sungai' => 'bantaran_sungai',
                        'Lain-lain' => 'lain_lain',
                    ];
                @endphp
                @foreach ($bentangan_wilayah as $label => $field)
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ $label }}</label>
                            <p class="form-control-plaintext">{{ number_format($topografi->$field, 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Letak Wilayah (Ha)</h6>
            <div class="row">
                @php
                    $letak_wilayah = [
                        'Kawasan Perkantoran' => 'kawasan_perkantoran',
                        'Kawasan Pertokoan' => 'kawasan_pertokoan',
                        'Kawasan Campuran' => 'kawasan_campuran',
                        'Kawasan Industri' => 'kawasan_industri',
                        'Kepulauan' => 'kepulauan',
                        'Pantai/Pesisir' => 'pantai_pesisir',
                        'Kawasan Hutan' => 'kawasan_hutan',
                        'Taman Suaka' => 'taman_suaka',
                        'Kawasan Wisata' => 'kawasan_wisata',
                        'Perbatasan Negara' => 'perbatasan_negara',
                        'Perbatasan Provinsi' => 'perbatasan_provinsi',
                        'Perbatasan Kabupaten' => 'perbatasan_kabupaten',
                        'Perbatasan Kecamatan' => 'perbatasan_kecamatan',
                        'DAS/Bantaran Sungai' => 'das_bantaran_sungai',
                        'Rawan Banjir' => 'rawan_banjir',
                        'Bebas Banjir' => 'bebas_banjir',
                        'Potensial Tsunami' => 'potensial_tsunami',
                        'Rawan Gempa' => 'rawan_gempa',
                    ];
                @endphp
                @foreach ($letak_wilayah as $label => $field)
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ $label }}</label>
                            <p class="form-control-plaintext">{{ number_format($topografi->$field, 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Orbitasi</h6>
            <div class="row">
                <div class="col-md-12">
                    <p class="fw-semibold">Ke Kecamatan</p>
                    <div class="row">
                        <div class="col-md-3"><label>Jarak:</label> {{ $topografi->jarak_ke_kecamatan }} km</div>
                        <div class="col-md-3"><label>Waktu Motor:</label> {{ $topografi->lama_bermotor_kecamatan }} jam</div>
                        <div class="col-md-3"><label>Waktu Non-Motor:</label> {{ $topografi->lama_non_bermotor_kecamatan }} jam</div>
                        <div class="col-md-3"><label>Kendaraan Umum:</label> {{ $topografi->kendaraan_umum_kecamatan }} unit</div>
                    </div>
                </div>
                 <div class="col-md-12 mt-3">
                    <p class="fw-semibold">Ke Kabupaten</p>
                    <div class="row">
                        <div class="col-md-3"><label>Jarak:</label> {{ $topografi->jarak_ke_kabupaten }} km</div>
                        <div class="col-md-3"><label>Waktu Motor:</label> {{ $topografi->lama_bermotor_kabupaten }} jam</div>
                        <div class="col-md-3"><label>Waktu Non-Motor:</label> {{ $topografi->lama_non_bermotor_kabupaten }} jam</div>
                        <div class="col-md-3"><label>Kendaraan Umum:</label> {{ $topografi->kendaraan_umum_kabupaten }} unit</div>
                    </div>
                </div>
                 <div class="col-md-12 mt-3">
                    <p class="fw-semibold">Ke Provinsi</p>
                    <div class="row">
                        <div class="col-md-3"><label>Jarak:</label> {{ $topografi->jarak_ke_provinsi }} km</div>
                        <div class="col-md-3"><label>Waktu Motor:</label> {{ $topografi->lama_bermotor_provinsi }} jam</div>
                        <div class="col-md-3"><label>Waktu Non-Motor:</label> {{ $topografi->lama_non_bermotor_provinsi }} jam</div>
                        <div class="col-md-3"><label>Kendaraan Umum:</label> {{ $topografi->kendaraan_umum_provinsi }} unit</div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('topografi.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('topografi.update')
                        <a href="{{ route('topografi.edit', $topografi->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection