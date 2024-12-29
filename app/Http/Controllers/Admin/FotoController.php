<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FotoRequest;
use App\Models\Peserta;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Peserta::where('user_id', '=', auth()->user()->id)->first();
        $nama  = auth()->user()->name;
        return view('pages.admin.foto.index', [
            'title'      => "Foto Pleton dan Surat Rekomendasi: $nama",
            'fotos'      => $fotos,
        ]);
    }

    public function update(FotoRequest $request, $id)
    {
        // Ambil data peserta berdasarkan user ID
        $edFoto = Peserta::where('user_id', '=', auth()->user()->id)->first();

        if (!$edFoto) {
            return redirect('/dashboard/administrasi/foto')->with('error', 'Data tidak ditemukan.');
        }

        // Update foto pleton
        if ($request->hasFile('foto_pleton')) {
            if ($edFoto->foto_pleton && Storage::disk('public')->exists($edFoto->foto_pleton)) {
                Storage::disk('public')->delete($edFoto->foto_pleton);
            }
            $file                = $request->file('foto_pleton');
            $filePath            = $file->store('foto_pleton', 'public');
            $edFoto->foto_pleton = $filePath;
        }

        // Update scan surat rekomendasi
        if ($request->hasFile('rekomendasi')) {
            if ($edFoto->rekomendasi && Storage::disk('public')->exists($edFoto->rekomendasi)) {
                Storage::disk('public')->delete($edFoto->rekomendasi);
            }
            $file                = $request->file('rekomendasi');
            $filePath            = $file->store('rekomendasi', 'public');
            $edFoto->rekomendasi = $filePath;
        }

        $edFoto->save();
        return redirect('/dashboard/administrasi/foto')->with('success', 'Data Berhasil Diperbarui!');
    }
}
