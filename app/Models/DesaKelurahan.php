<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesaKelurahan extends Model
{
    protected $fillable = [
        'tanggal',

        // Bagian Gedung Kantor
        'gedung_kantor',
        'ruang_kerja',
        'kondisi',
        'balai_desa',
        'listrik',
        'air_bersih',
        'telepon',
        'rumah_dinas_kepala_desa',
        'rumah_dinas_perangkat',
        'fasilitas_lainnya',

        'mesin_tik',
        'meja',
        'kursi',
        'lemari_arsip',
        'komputer',
        'mesin_fax',
        'kendaraan_dinas',

        // Bagian Administrasi Pemerintahan
        'buku_data_peraturan_desa',
        'buku_keputusan_kepala_desa',
        'buku_administrasi_kependudukan',
        'buku_data_inventaris',
        'buku_data_aparat',
        'buku_data_tanah_kas_desa',
        'buku_administrasi_pajak',
        'buku_data_tanah',
        'buku_laporan_pengaduan',
        'buku_agenda_ekspedisi',
        'buku_profil_desa',
        'buku_data_induk_penduduk',
        'buku_data_mutasi_penduduk',
        'buku_rekapitulasi_penduduk',
        'buku_registrasi_pelayanan',
        'buku_data_penduduk_sementara',
        'buku_anggaran_penerimaan',
        'buku_agenda_pengeluaran',
        'buku_kas_umum',
        'buku_kas_pembantu_penerimaan',
        'buku_kas_pembantu_pengeluaran',
        'buku_lembaga_kemasyarakatan',

        // Bagian infrastruktur tambahan
        'pos_kamling',
        'jumlah_pos_kamling',
        'lapangan_olahraga',
        'tempat_parkir',
        'tahun_pembangunan',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'ruang_kerja' => 'integer',
        'mesin_tik' => 'integer',
        'meja' => 'integer',
        'kursi' => 'integer',
        'lemari_arsip' => 'integer',
        'komputer' => 'integer',
        'mesin_fax' => 'integer',
        'kendaraan_dinas' => 'integer',
        'jumlah_pos_kamling' => 'integer',
        'tahun_pembangunan' => 'integer',
    ];
}