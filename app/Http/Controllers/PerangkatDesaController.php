<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perangkatDesas = DB::table('perangkat_desas')
            ->leftJoin('desas', 'perangkat_desas.desa_id', '=', 'desas.id')
            ->leftJoin('jabatans', 'perangkat_desas.jabatan_id', '=', 'jabatans.id')
            ->select('perangkat_desas.*', 'desas.nama_desa', 'jabatans.nama_jabatan')
            ->paginate(10);

        return view('pages.perangkatdesa.index', compact('perangkatDesas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = DB::table('desas')->get();
        $jabatans = DB::table('jabatans')->get();

        return view('pages.perangkatdesa.create', compact('desas', 'jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desa_id' => 'required|exists:desas,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'golongan_darah' => 'nullable|string|max:3',
            'kontak' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'masa_jabatan' => 'nullable|string|max:100',
            'nama_pasangan' => 'nullable|string|max:100',
            'jumlah_anak' => 'nullable|integer|min:0',
            'sambutan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check for duplicate desa_id, jabatan_id, and masa_jabatan
        if ($request->masa_jabatan) {
            $existing = DB::table('perangkat_desas')
                ->where('desa_id', $request->desa_id)
                ->where('jabatan_id', $request->jabatan_id)
                ->where('masa_jabatan', $request->masa_jabatan)
                ->first();

            if ($existing) {
                return redirect()->back()
                    ->withErrors('Perangkat desa dengan desa, jabatan, dan masa jabatan yang sama sudah ada.')
                    ->withInput();
            }
        }

        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'foto']);
            $data['created_at'] = now();
            $data['updated_at'] = now();

            // Handle file upload
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('perangkatdesa', 'public');
                $data['foto'] = $fotoPath;
            }

            DB::table('perangkat_desas')->insert($data);

            DB::commit();
            return redirect()->route('perangkat_desa.index')->with('success', 'Perangkat Desa berhasil dibuat.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal membuat perangkat desa: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perangkatDesa = DB::table('perangkat_desas')
            ->leftJoin('desas', 'perangkat_desas.desa_id', '=', 'desas.id')
            ->leftJoin('jabatans', 'perangkat_desas.jabatan_id', '=', 'jabatans.id')
            ->select('perangkat_desas.*', 'desas.nama_desa', 'jabatans.nama_jabatan')
            ->where('perangkat_desas.id', $id)
            ->first();

        if (!$perangkatDesa) {
            return redirect()->route('perangkat_desa.index')->withErrors('Perangkat Desa tidak ditemukan.');
        }

        return view('pages.perangkatdesa.show', compact('perangkatDesa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perangkatDesa = DB::table('perangkat_desas')->where('id', $id)->first();

        if (!$perangkatDesa) {
            return redirect()->route('perangkat_desa.index')->withErrors('Perangkat Desa tidak ditemukan.');
        }

        $desas = DB::table('desas')->get();
        $jabatans = DB::table('jabatans')->get();

        return view('pages.perangkatdesa.edit', compact('perangkatDesa', 'desas', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'desa_id' => 'required|exists:desas,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'golongan_darah' => 'nullable|string|max:3',
            'kontak' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'masa_jabatan' => 'nullable|string|max:100',
            'nama_pasangan' => 'nullable|string|max:100',
            'jumlah_anak' => 'nullable|integer|min:0',
            'sambutan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $perangkatDesa = DB::table('perangkat_desas')->where('id', $id)->first();

        if (!$perangkatDesa) {
            return redirect()->route('perangkat_desa.index')->withErrors('Perangkat Desa tidak ditemukan.');
        }

        // Check for duplicate desa_id, jabatan_id, and masa_jabatan (exclude current record)
        if ($request->masa_jabatan) {
            $existing = DB::table('perangkat_desas')
                ->where('desa_id', $request->desa_id)
                ->where('jabatan_id', $request->jabatan_id)
                ->where('masa_jabatan', $request->masa_jabatan)
                ->where('id', '!=', $id)
                ->first();

            if ($existing) {
                return redirect()->back()
                    ->withErrors('Perangkat desa dengan desa, jabatan, dan masa jabatan yang sama sudah ada.')
                    ->withInput();
            }
        }

        DB::beginTransaction();
        try {
            $data = $request->except(['_token', '_method', 'foto']);
            $data['updated_at'] = now();

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Delete old foto if exists
                if ($perangkatDesa->foto && Storage::disk('public')->exists($perangkatDesa->foto)) {
                    Storage::disk('public')->delete($perangkatDesa->foto);
                }

                $fotoPath = $request->file('foto')->store('perangkatdesa', 'public');
                $data['foto'] = $fotoPath;
            }

            DB::table('perangkat_desas')->where('id', $id)->update($data);

            DB::commit();
            return redirect()->route('perangkat_desa.index')->with('success', 'Perangkat Desa berhasil diperbaharui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Gagal memperbaharui perangkat desa: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perangkatDesa = DB::table('perangkat_desas')->where('id', $id)->first();

        if (!$perangkatDesa) {
            return redirect()->route('perangkat_desa.index')->withErrors('Perangkat Desa tidak ditemukan.');
        }

        try {
            // Delete foto if exists
            if ($perangkatDesa->foto && Storage::disk('public')->exists($perangkatDesa->foto)) {
                Storage::disk('public')->delete($perangkatDesa->foto);
            }

            DB::table('perangkat_desas')->where('id', $id)->delete();

            return redirect()->route('perangkat_desa.index')->with('success', 'Perangkat Desa berhasil dihapus.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menghapus perangkat desa: ' . $th->getMessage());
        }
    }

    public function checkDuplicate(Request $request)
    {
        $desa_id = $request->input('desa_id');
        $jabatan_id = $request->input('jabatan_id');
        $masa_jabatan = $request->input('masa_jabatan');
        $exclude_id = $request->input('exclude_id'); // For edit mode

        if (!$desa_id || !$jabatan_id || !$masa_jabatan) {
            return response()->json([
                'duplicate' => false,
                'message' => ''
            ]);
        }

        $query = DB::table('perangkat_desas')
            ->where('desa_id', $desa_id)
            ->where('jabatan_id', $jabatan_id)
            ->where('masa_jabatan', $masa_jabatan);

        if ($exclude_id) {
            $query->where('id', '!=', $exclude_id);
        }

        $exists = $query->exists();

        return response()->json([
            'duplicate' => $exists,
            'message' => $exists ? 'Perangkat desa dengan desa, jabatan, dan masa jabatan yang sama sudah ada.' : ''
        ]);
    }
}