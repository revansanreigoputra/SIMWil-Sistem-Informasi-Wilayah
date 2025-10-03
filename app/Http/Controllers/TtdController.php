<?php

namespace App\Http\Controllers;

use App\Models\Ttd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class TtdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ttds = DB::table('ttds')
            ->leftJoin('perangkat_desas', 'ttds.perangkat_desa_id', '=', 'perangkat_desas.id')
            ->leftJoin('desas', 'perangkat_desas.desa_id', '=', 'desas.id')
            ->select(
                'ttds.id',
                'ttds.nip',
                'ttds.nama',
                'ttds.jabatan',
                'ttds.status_aktif',
                'ttds.keterangan',
                'perangkat_desas.nama as nama_perangkat',
                'desas.nama_desa'
            )
            ->get();

        return view('pages.ttd.index', compact('ttds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usedPerangkatIds = DB::table('ttds')->whereNotNull('perangkat_desa_id')->pluck('perangkat_desa_id')->toArray();

        $perangkatDesas = DB::table('perangkat_desas')
            ->leftJoin('desas', 'perangkat_desas.desa_id', '=', 'desas.id')
            ->leftJoin('jabatans', 'perangkat_desas.jabatan_id', '=', 'jabatans.id')
            ->select('perangkat_desas.*', 'desas.nama_desa', 'jabatans.nama_jabatan as jabatan')
            ->whereNotIn('perangkat_desas.id', $usedPerangkatIds)
            ->get();

        return view('pages.ttd.create', compact('perangkatDesas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perangkat_desa_id' => 'nullable|exists:perangkat_desas,id',
            'nip' => 'nullable|string|max:50',
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'status_aktif' => 'boolean',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if perangkat_desa_id is already used
        if ($request->perangkat_desa_id) {
            $exists = DB::table('ttds')->where('perangkat_desa_id', $request->perangkat_desa_id)->exists();
            if ($exists) {
                return redirect()->back()->withErrors('Perangkat Desa sudah digunakan untuk Penanda Tangan lain.')->withInput();
            }
        }

        DB::beginTransaction();
        try {
            $data = $request->except(['_token']);
            $data['created_at'] = now();
            $data['updated_at'] = now();

            DB::table('ttds')->insert($data);

            DB::commit();
            return redirect()->route('ttd.index')->with('success', 'Penanda Tangan berhasil dibuat.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal membuat penanda tangan: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ttd $ttd)
    {
        $ttd = DB::table('ttds')
            ->leftJoin('perangkat_desas', 'ttds.perangkat_desa_id', '=', 'perangkat_desas.id')
            ->leftJoin('desas', 'perangkat_desas.desa_id', '=', 'desas.id')
            ->select(
                'ttds.id',
                'ttds.perangkat_desa_id',
                'ttds.nip',
                'ttds.nama',
                'ttds.jabatan',
                'ttds.status_aktif',
                'ttds.keterangan',
                'ttds.created_at',
                'ttds.updated_at',
                'perangkat_desas.nama as nama_perangkat',
                'desas.nama_desa'
            )
            ->where('ttds.id', $ttd->id)
            ->first();

        if (!$ttd) {
            return redirect()->route('ttd.index')->withErrors('Penanda Tangan tidak ditemukan.');
        }

        return view('pages.ttd.show', compact('ttd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ttd $ttd)
    {
        $ttd = DB::table('ttds')->where('id', $ttd->id)->first();

        if (!$ttd) {
            return redirect()->route('ttd.index')->withErrors('Penanda Tangan tidak ditemukan.');
        }

        $usedPerangkatIds = DB::table('ttds')->whereNotNull('perangkat_desa_id')->where('id', '!=', $ttd->id)->pluck('perangkat_desa_id')->toArray();

        $perangkatDesas = DB::table('perangkat_desas')
            ->leftJoin('desas', 'perangkat_desas.desa_id', '=', 'desas.id')
            ->leftJoin('jabatans', 'perangkat_desas.jabatan_id', '=', 'jabatans.id')
            ->select('perangkat_desas.*', 'desas.nama_desa', 'jabatans.nama_jabatan as jabatan')
            ->whereNotIn('perangkat_desas.id', $usedPerangkatIds)
            ->get();

        return view('pages.ttd.edit', compact('ttd', 'perangkatDesas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ttd $ttd)
    {
        $validator = Validator::make($request->all(), [
            'perangkat_desa_id' => 'nullable|exists:perangkat_desas,id',
            'nip' => 'nullable|string|max:50',
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'status_aktif' => 'boolean',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ttdRecord = DB::table('ttds')->where('id', $ttd->id)->first();

        // Check if perangkat_desa_id is already used by another TTD
        if ($request->perangkat_desa_id && $request->perangkat_desa_id != $ttdRecord->perangkat_desa_id) {
            $exists = DB::table('ttds')->where('perangkat_desa_id', $request->perangkat_desa_id)->exists();
            if ($exists) {
                return redirect()->back()->withErrors('Perangkat Desa sudah digunakan untuk Penanda Tangan lain.')->withInput();
            }
        }

        DB::beginTransaction();
        try {
            $data = $request->except(['_token', '_method']);
            $data['updated_at'] = now();

            DB::table('ttds')->where('id', $ttd->id)->update($data);

            DB::commit();
            return redirect()->route('ttd.index')->with('success', 'Penanda Tangan berhasil diperbaharui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal memperbaharui penanda tangan: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ttd $ttd)
    {
        $ttdRecord = DB::table('ttds')->where('id', $ttd->id)->first();

        if (!$ttdRecord) {
            return redirect()->route('ttd.index')->withErrors('Penanda Tangan tidak ditemukan.');
        }

        try {
            DB::table('ttds')->where('id', $ttd->id)->delete();

            return redirect()->route('ttd.index')->with('success', 'Penanda Tangan berhasil dihapus.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menghapus penanda tangan: ' . $th->getMessage());
        }
    }
}