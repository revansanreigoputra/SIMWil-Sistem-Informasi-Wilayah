<?php

namespace App\Http\Controllers\LayananSurat;
use App\Models\LayananSurat\KopTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class KopTemplateController extends Controller
{
    public function index()
    {
        $kopTemplates = KopTemplate::all();
        return view('pages.layanan.template.kop_templates.index', compact('kopTemplates'));
    }

    public function create()
    {

        return view('pages.layanan.template.kop_templates.create');
    }
   
    public function store(Request $request)
    {
         
        $request->validate([
            'nama' => 'required|string|max:255|unique:kop_templates,nama',
           
            'jenis_kop' => ['required', Rule::in(['kop surat', 'kop laporan'])],
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.unique' => 'Nama kop sudah ada.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Logo harus berformat jpeg, png, jpg, gif, atau svg.',
            'logo.max' => 'Logo maksimal 2MB.',
            'jenis_kop.required' => 'Jenis kop harus dipilih.',
            'jenis_kop.in' => 'Jenis kop yang dipilih tidak valid.'
        ]);

          $data = $request->only(['nama', 'jenis_kop']);

         
        if ($request->hasFile('logo')) {
            
            $path = $request->file('logo')->store('uploads/kop_logos', 'public');
            $data['logo'] = $path;
        }
 
        KopTemplate::create($data);
 
        return redirect()->route('kop_templates.index')->with('success', 'Kop Template berhasil dibuat.');
    }
    public function edit($id)
    {
        $kopTemplate = KopTemplate::findOrFail($id);
        return view('pages.layanan.template.kop_templates.edit', compact('kopTemplate'));
    }
    public function update(Request $request, $id)
    {
        $kopTemplate = KopTemplate::findOrFail($id);

        $request->validate([
            'nama' => ['required', 'string', 'max:255', Rule::unique('kop_templates')->ignore($kopTemplate->id)],
            'jenis_kop' => ['required', Rule::in(['kop surat', 'kop laporan'])],
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.unique' => 'Nama kop sudah ada.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Logo harus berformat jpeg, png, jpg, gif, atau svg.',
            'logo.max' => 'Logo maksimal 2MB.',
            'jenis_kop.required' => 'Jenis kop harus dipilih.',
            'jenis_kop.in' => 'Jenis kop yang dipilih tidak valid.'
        ]);

        $data = $request->only(['nama', 'jenis_kop']);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($kopTemplate->logo) {
                Storage::disk('public')->delete($kopTemplate->logo);
            }
            $path = $request->file('logo')->store('uploads/kop_logos', 'public');
            $data['logo'] = $path;
        }

        $kopTemplate->update($data);

        return redirect()->route('kop_templates.index')->with('success', 'Kop Template berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $kopTemplate = KopTemplate::findOrFail($id);

        // Hapus logo jika ada
        if ($kopTemplate->logo) {
            Storage::disk('public')->delete($kopTemplate->logo);
        }

        $kopTemplate->delete();

        return redirect()->route('kop_templates.index')->with('success', 'Kop Template berhasil dihapus.');
    }
}
