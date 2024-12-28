<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AbaabaRequest;
use App\Http\Requests\Admin\AbaabaUpdateRequest;
use App\Models\Abaaba;
use App\Models\Jenis;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class AbaabaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.abaaba.data', [
            'title'      => 'Data Aba-Aba',
            'tingkatans' => Tingkatan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $tingkatanId = $request->input('tingkatan_id');
        $tingkatan   = Tingkatan::findOrFail($tingkatanId);
        $jenises     = Jenis::where('tingkatan_id', $tingkatanId)->orderBy('urutan')->get();

        return view('pages.admin.abaaba.create', [
            'title'      => "Tambah Data Aba-Aba $tingkatan->nama_tingkatan",
            'jenises'    => $jenises,
            'tingkatan'  => $tingkatan,
            'tingkatanId'=> $tingkatanId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AbaabaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbaabaRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $abaabas                = new Abaaba();
        $abaabas->jenis_id      = $request->jenis_id;
        $abaabas->nama_abaaba   = $request->nama_abaaba;
        $abaabas->urutan_abaaba = $request->urutan_abaaba;
        $abaabas->save();

        $jenis = Jenis::findOrFail($request->jenis_id);
        return redirect()->route('aba-aba.show', ['id' => $jenis->tingkatan_id])
            ->with('success', 'Aba-Aba Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        $tingkatan = Tingkatan::where('slug', $slug)->firstOrFail();
        $jenises   = Jenis::where('tingkatan_id', $tingkatan->id)->orderBy('urutan')->get();
        $abaabas   = Abaaba::whereHas('jenis', function ($query) use ($tingkatan) {
            $query->where('tingkatan_id', $tingkatan->id);
        })->orderBy('urutan_abaaba')->get();
        return view('pages.admin.abaaba.show', [
            'title'      => "Aba-Aba $tingkatan->nama_tingkatan",
            'tingkatan'  => $tingkatan,
            'jenises'    => $jenises,
            'abaabas'    => $abaabas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        $abaaba = Abaaba::findOrFail($id);
        $tingkatanId = $abaaba->jenis ? $abaaba->jenis->tingkatan_id : null;
        if (!$tingkatanId) {
            return redirect()->back()->with('error', 'Data Tingkatan Tidak Ditemukan.');
        }
        $tingkatans = Tingkatan::findOrFail($tingkatanId);
        $jenises = Jenis::where('tingkatan_id', $tingkatanId)
            ->select('id', 'jenis_name')
            ->orderBy('urutan')
            ->get();

        return view('pages.admin.abaaba.edit', [
            'title'      => "Edit Data $abaaba->nama_abaaba ($tingkatans->nama_tingkatan)",
            'abaaba'     => $abaaba,
            'jenises'    => $jenises,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AbaabaUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbaabaUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        // Update data aba-aba
        $abaaba                = Abaaba::findOrFail($id);
        $abaaba->jenis_id      = $request->jenis_id;
        $abaaba->nama_abaaba   = $request->nama_abaaba;
        $abaaba->urutan_abaaba = $request->urutan_abaaba;
        $abaaba->save();

        // Redirect ke halaman show dengan parameter tingkatan_id
        return redirect()->route('aba-aba.show', $abaaba->jenis->tingkatan_id)
            ->with('success', 'Aba-Aba yang Dipilih Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $abaaba = Abaaba::findOrFail($id);
        $tingkatanId = $abaaba->jenis->tingkatan_id;
        $abaaba->delete();
        return redirect()->route('aba-aba.show', ['id' => $tingkatanId])
            ->with('success', 'Aba-Aba yang Dipilih Telah Dihapus!');
    }
}
