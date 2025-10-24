<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class politik extends Model
{
    use HasFactory;
    protected $table = 'politiks';
    protected $fillable = [
        'id_desa',
        'tanggal',

        // Partai Politik dan Pemilihan Umum
        'jumlah_penduduk_memiliki_hak_pilih',
        'jumlah_pengguna_hak_pilih_pemilu_legislatif',
        'jumlah_perempuan_aktif_partai_politik',
        'jumlah_partai_politik_memiliki_pengurus',
        'jumlah_partai_politik_memiliki_kantor',
        'jumlah_penduduk_pengurus_partai',
        'jumlah_penduduk_dipilih_legislatif',
        'jumlah_pengguna_hak_pilih_presiden',

        // Pemilihan Kepala Daerah
        'jumlah_penduduk_memiliki_hak_pilih_pilkada',
        'jumlah_pengguna_hak_pilih_bupati',
        'jumlah_pengguna_hak_pilih_gubernur',

        // Penentuan Kepala Desa/Lurah dan Perangkat
        'penentuan_jabatan_kepala_desa',
        'penentuan_sekretaris_desa',
        'penentuan_perangkat_desa',
        'masa_jabatan_kepala_desa',
        'penentuan_jabatan_lurah',

        // BPD
        'jumlah_anggota_bpd',
        'penentuan_anggota_bpd',
        'pimpinan_bpd',
        'kantor_bpd',
        'anggaran_bpd',
        'peraturan_desa',
        'permintaan_keterangan_kepala_desa',
        'rancangan_perdes',
        'menyalurkan_aspirasi',
        'menyatakan_pendapat',
        'menyampaikan_usul',
        'mengevaluasi_apb_desa',

        // LKD / LKK
        'keberadaan_organisasi_lkd',
        'dasar_hukum_organisasi_lkd',
        'jumlah_organisasi_lkd_desa',
        'dasar_hukum_pembentukan_lkd_kelurahan',
        'jumlah_organisasi_lkd_kelurahan',
        'pemilihan_pengurus_lkd',
        'pemilihan_pengurus_organisasi_lkd',
        'status_lkd',
        'jumlah_kegiatan_lkd',
        'fungsi_tugas_lkd',
        'jumlah_kegiatan_organisasi_lkd',
        'alokasi_anggaran_lkd',
        'alokasi_anggaran_organisasi',
        'kantor_lkd',
        'dukungan_pembiayaan',
        'realisasi_program_kerja',
        'keberadaan_alat_kelengkapan',
        'kegiatan_administrasi',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
