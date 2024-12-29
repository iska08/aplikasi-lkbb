<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenilaianStoreRequest;
use App\Http\Requests\Admin\PenilaianUpdateRequest;
use App\Models\Abaaba;
use App\Models\Jenis;
use App\Models\Penilaian;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    protected $limit = 10;
    protected $fields = array('penilaians.*', 'abaabas.*');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.admin.penilaian.data', [
            'title'      => 'Data Skala Penilaian',
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

        $cekIdPenilaians = Penilaian::pluck('abaaba_id')->toArray();
        $tingkatanId = $request->input('tingkatan_id');
        $tingkatan   = Tingkatan::findOrFail($tingkatanId);
        $jenises     = Jenis::where('tingkatan_id', $tingkatanId)->orderBy('urutan')->get();
        $abaabas     = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->join('tingkatans', 'jenis.tingkatan_id', '=', 'tingkatans.id')
            ->where('jenis.tingkatan_id', $tingkatanId)
            ->select('abaabas.*', 'jenis.jenis_name', 'tingkatans.nama_tingkatan')
            ->orderby('jenis.urutan')
            ->orderby('abaabas.urutan_abaaba')
            ->get();

        return view('pages.admin.penilaian.create', [
            'title'           => "Tambah Skala Penilaian $tingkatan->nama_tingkatan",
            'cekIdPenilaians' => $cekIdPenilaians,
            'jenises'         => $jenises,
            'abaabas'         => $abaabas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenilaianStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $penilaians            = new Penilaian();
        $penilaians->abaaba_id = $request->abaaba_id;
        $penilaians->skala1    = $request->skala1;
        $penilaians->skala2    = $request->skala2;
        $penilaians->skala3    = $request->skala3;
        $penilaians->skala4    = $request->skala4;
        $penilaians->skala5    = $request->skala5;
        $penilaians->skala6    = $request->skala6;
        $penilaians->skala7    = $request->skala7;
        $penilaians->save();

        $abaaba = Abaaba::findOrFail($request->abaaba_id);
        $tingkatanId = $abaaba->jenis->tingkatan_id ?? null;
        if (!$tingkatanId) {
            return redirect()->route('penilaian.index')->with('error', 'Data Tingkatan Tidak Ditemukan.');
        }

        return redirect()->route('penilaian.show', ['id' => $tingkatanId])
            ->with('success', "Tambah Skala Penilaian Baru Berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $tingkatan = Tingkatan::where('slug', $slug)->firstOrFail();
        $jenises   = Jenis::where('tingkatan_id', $tingkatan->id)->orderBy('urutan')->get();
        $abaabas   = Abaaba::whereHas('jenis', function ($query) use ($tingkatan) {
            $query->where('tingkatan_id', $tingkatan->id);
        })->orderBy('urutan_abaaba')->get();
        $penilaians = Penilaian::join('abaabas', 'penilaians.abaaba_id', '=', 'abaabas.id')
            ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->select('penilaians.*', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderby('abaabas.urutan_abaaba')
            ->get();
        
        return view('pages.admin.penilaian.show', [
            'title'      => "Skala Penilaian $tingkatan->nama_tingkatan",
            'tingkatan'  => $tingkatan,
            'jenises'    => $jenises,
            'abaabas'    => $abaabas,
            'penilaians' => $penilaians,
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

        $penilaian   = Penilaian::findOrFail($id);
        $edPenilaian = Penilaian::join('abaabas', 'penilaians.abaaba_id', '=', 'abaabas.id')
            ->where('penilaians.id', '=', $id)
            ->select('penilaians.id', 'abaabas.nama_abaaba')
            ->first();

        return view('pages.admin.penilaian.edit', [
            'title'       => "Edit Skala Penilaian $edPenilaian->nama_abaaba",
            'penilaian'   => $penilaian,
            'edPenilaian' => $edPenilaian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PenilaianUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $edPenilaian            = Penilaian::findOrFail($id);
        $edPenilaian->abaaba_id = $request->abaaba_id;
        $edPenilaian->skala1    = $request->skala1;
        $edPenilaian->skala2    = $request->skala2;
        $edPenilaian->skala3    = $request->skala3;
        $edPenilaian->skala4    = $request->skala4;
        $edPenilaian->skala5    = $request->skala5;
        $edPenilaian->skala6    = $request->skala6;
        $edPenilaian->skala7    = $request->skala7;
        $edPenilaian->save();

        $abaaba = Abaaba::findOrFail($request->abaaba_id);
        $tingkatanId = $abaaba->jenis->tingkatan_id ?? null;
        if (!$tingkatanId) {
            return redirect()->route('penilaian.index')->with('error', 'Data Tingkatan Tidak Ditemukan.');
        }

        return redirect()->route('penilaian.show', ['id' => $tingkatanId])
            ->with('success', "Edit Skala Penilaian Baru Berhasil");
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

        $penilaian = Penilaian::findOrFail($id);
        $abaabaId = $penilaian->abaaba_id;
        $penilaian->delete();
        $abaaba = Abaaba::findOrFail($abaabaId);
        $tingkatanId = $abaaba->jenis->tingkatan_id ?? null;
        if (!$tingkatanId) {
            return redirect()->route('penilaian.index')->with('error', 'Data Tingkatan Tidak Ditemukan.');
        }
        
        return redirect()->route('penilaian.show', ['id' => $tingkatanId])
            ->with('success', 'Skala Penilaian yang Dipilih Telah Dihapus!');
    }
}