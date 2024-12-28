<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PletonStoreRequest;
use App\Http\Requests\Admin\PletonUpdateRequest;
use App\Models\Peserta;
use App\Models\Pleton;
use App\Models\Posisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PletonController extends Controller
{
    protected $limit = 10;
    protected $fields = array('pletons.*', 'pesertas.*', 'posisis.*');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->level !== '4PESERTA') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $userId     = auth()->user()->id;
        $cekPeserta = Peserta::where('user_id', '=', $userId)->first();

        if (!$cekPeserta) {
            return view('pages.admin.pleton.data', [
                'title'          => 'Data Pleton',
                'pletons'        => collect(),
                'perPageOptions' => [5, 10, 15, 20, 25],
                'perPage'        => 10,
                'cekPeserta'     => false
            ]);
        }

        $pletons = Pleton::join('pesertas', 'pletons.peserta_id', '=', 'pesertas.id')
            ->join('posisis', 'pletons.posisi', '=', 'posisis.id')
            ->where('pesertas.user_id', '=', $userId)
            ->orderBy('posisis.nama_posisi')
            ->select(
                'pletons.id as pleton_id',
                'pletons.nama_anggota',
                'pletons.kelas_anggota',
                'pletons.nis_anggota',
                'pletons.foto_anggota',
                'pesertas.id as peserta_id',
                'pesertas.user_id as peserta_user_id',
                'posisis.id as posisi_id',
                'posisis.nama_posisi as nama_posisi'
            );
        
        $page           = $request->query('page', 1);
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $pletons = $pletons->paginate($perPage, ['*'], 'page', $page);

        return view('pages.admin.pleton.data', [
            'title'          => 'Data Pleton',
            'pletons'        => $pletons,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
            'cekPeserta'     => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== '4PESERTA') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $posisis = Posisi::orderBy('nama_posisi')->get();
        return view('pages.admin.pleton.create', [
            'title'      => 'Tambah Anggota Pleton',
            'posisis'    => $posisis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PletonStoreRequest $request)
    {
        if (auth()->user()->level !== '4PESERTA') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $userId    = auth()->user()->id;
        $pesertaId = Peserta::where('user_id', $userId)->value('id');
        $pletons   = new Pleton();
        $pletons->peserta_id    = $pesertaId;
        $pletons->nama_anggota  = $request->nama_anggota;
        $pletons->kelas_anggota = $request->kelas_anggota;
        $pletons->nis_anggota   = $request->nis_anggota;
        $pletons->posisi        = $request->posisi;
        if ($request->hasFile('foto_anggota')) {
            $file                  = $request->file('foto_anggota');
            $filePath              = $file->store('foto_anggota', 'public');
            $pletons->foto_anggota = $filePath;
        }
        $pletons->save();
        return redirect('/dashboard/administrasi/pleton')->with('success', 'Anggota Pleton Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level !== '4PESERTA') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        $users = Pleton::join('pesertas', 'pletons.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pletons.id', '=', $id)
            ->select('users.id', 'users.name')
            ->get();
        if ($users->isEmpty() || auth()->user()->id !== $users->first()->id) {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Mengakses Data Ini.');
        }
        $edPleton = Pleton::findOrFail($id);
        $posisis = Posisi::orderBy('nama_posisi')->get();
        return view('pages.admin.pleton.edit', [
            'title'      => "Edit Data $edPleton->nama_anggota: {$users->first()->name}",
            'edPleton'   => $edPleton,
            'posisis'    => $posisis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PletonUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '4PESERTA') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $edPleton = Pleton::FindOrFail($id);
        $edPleton->nama_anggota  = $request->nama_anggota;
        $edPleton->kelas_anggota = $request->kelas_anggota;
        $edPleton->nis_anggota   = $request->nis_anggota;
        $edPleton->posisi        = $request->posisi;
        if ($request->hasFile('foto_anggota')) {
            if ($edPleton->foto_anggota && \Storage::disk('public')->exists($edPleton->foto_anggota)) {
                \Storage::disk('public')->delete($edPleton->foto_anggota);
            }
            $file                   = $request->file('foto_anggota');
            $filePath               = $file->store('foto_anggota', 'public');
            $edPleton->foto_anggota = $filePath;
        }
        $edPleton->save();
        return redirect('/dashboard/administrasi/pleton')->with('success', 'Anggota yang Dipilih Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level !== '4PESERTA') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        $edPleton = Pleton::findOrFail($id);
        if ($edPleton->foto_anggota) {
            \Storage::disk('public')->delete($edPleton->foto_anggota);
        }
        $edPleton->delete();
        
        return redirect('/dashboard/administrasi/pleton')->with('success', 'Anggota yang Dipilih Telah Dihapus!');
    }
}