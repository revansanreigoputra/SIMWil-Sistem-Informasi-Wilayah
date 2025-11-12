<?php

namespace App\Http\Controllers\LayananSurat;
use App\Models\LayananSurat\Permohonan;  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class NotificationController extends Controller
{public function getUnverifiedPermohonan()
    {
        // Fetch unverified applications, ordered by newest first
        $unverified = Permohonan::with(['jenisSurat', 'anggotaKeluarga'])
            ->where('status', 'belum_diverifikasi')
            ->orderBy('created_at', 'desc')
            ->take(5)  
            ->get();

        $count = Permohonan::where('status', 'belum_diverifikasi')->count();

        return response()->json([
            'count' => $count,
            'notifications' => $unverified->map(function ($item) {
                return [
                    'id' => $item->id,
                    'jenis_surat' => $item->jenisSurat->nama,
                    'pemohon' => $item->anggotaKeluarga->nama ?? 'Warga Baru',
                    'time' => $item->created_at->diffForHumans(), 
                    'url' => route('permohonan.edit', $item->id),
                ];
            }),
        ]);
    }
    
   
    public function markAsRead($id) {
       
    }
}