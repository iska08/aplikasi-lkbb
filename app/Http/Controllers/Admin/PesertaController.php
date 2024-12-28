<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PesertaStoreRequest;
use App\Http\Requests\Admin\PesertaUpdateRequest;
use App\Models\Peserta;
use App\Models\Pleton;
use App\Models\Tingkatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesertaController extends Controller
{
    protected $limit = 10;
    protected $fields = array('pesertas.*');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        // Ambil nilai filter dari request
        $search    = $request->query('search');
        $tingkatan = $request->query('tingkatan');
        $pesertas = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
            ->join('tingkatans', 'pesertas.tingkatan_id', '=', 'tingkatans.id')
            ->where('users.level', '=', '4PESERTA')
            ->select('pesertas.*', 'users.name', 'tingkatans.nama_tingkatan')
            ->orderby('pesertas.id');
        // Filter berdasarkan pencarian (search)
        if ($search) {
            $pesertas->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%$search%")
                    ->orWhere('pesertas.no_urut', 'like', "%$search%");
            });
        }
        // Filter berdasarkan tingkatan
        if ($tingkatan) {
            $pesertas->where('tingkatans.id', $tingkatan);
        }

        $pesertas->select('pesertas.*', 'users.name', 'tingkatans.nama_tingkatan')
                ->orderby('pesertas.id');

        $page           = $request->query('page', 1);
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $pesertas       = $pesertas->paginate($perPage, $this->fields, 'page', $page);
        $tingkatans     = Tingkatan::orderBy('id')->get();

        return view('pages.admin.peserta.data', [
            'title'          => 'Data Peserta',
            'pesertas'       => $pesertas,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
            'search'         => $search,
            'tingkatan'      => $tingkatan,
            'tingkatans'     => $tingkatans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $pesertaLunas    = User::where('level', '=', '4PESERTA')->orderBy('id')->get();
        $selectedUserIds = Peserta::pluck('user_id')->toArray();
        $tingkatans      = Tingkatan::orderBy('id')->get();

        return view('pages.admin.peserta.create', [
            'title'           => 'Tambah Peserta',
            'pesertaLunas'    => $pesertaLunas,
            'selectedUserIds' => $selectedUserIds,
            'tingkatans'      => $tingkatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesertaStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $pesertas               = new Peserta();
        $pesertas->user_id      = $request->user_id;
        $pesertas->tingkatan_id = $request->tingkatan_id;
        $pesertas->no_urut      = $request->no_urut;
        $pesertas->save();

        return redirect('/dashboard/administrasi/peserta')->with('success', 'Peserta Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        $edPeserta  = User::FindOrFail($id);
        $pesertas   = Pleton::join('pesertas', 'pletons.peserta_id', '=', 'pesertas.id')
            ->join('posisis', 'pletons.posisi', '=', 'posisis.id')
            ->where('pesertas.user_id', '=', $id)
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
            )->get();

        return view('pages.admin.peserta.show', [
            'title'      => "Data Pleton: $edPeserta->name",
            'pesertas'   => $pesertas,
            'id'         => $id,
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
        $pesertaLunas = User::where('level', '=', '4PESERTA')->orderBy('name')->get();
        $tingkatans   = Tingkatan::orderBy('id')->get();
        $edPeserta    = Peserta::FindOrFail($id);
        $userLevel    = auth()->user()->level;
        if ($userLevel === '1ADMIN') {
            $title = 'Edit Peserta';
        } elseif($userLevel === '2PESERTA') {
            $title = 'Edit Data Pleton';
        }

        return view('pages.admin.peserta.edit', [
            'title'        => $title,
            'edPeserta'    => $edPeserta,
            'pesertaLunas' => $pesertaLunas,
            'tingkatans'   => $tingkatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PesertaUpdateRequest $request, $id)
    {
        $edPeserta = Peserta::FindOrFail($id);
        $userLevel = auth()->user()->level;

        if ($userLevel === '1ADMIN') {
            $edPeserta->no_urut      = $request->no_urut;
            $edPeserta->tingkatan_id = $request->tingkatan_id;
        } elseif($userLevel === '4PESERTA') {
            if ($request->hasFile('foto_pleton')) {
                if ($edPeserta->foto_pleton && \Storage::disk('public')->exists($edPeserta->foto_pleton)) {
                    \Storage::disk('public')->delete($edPeserta->foto_pleton);
                }
                $file                   = $request->file('foto_pleton');
                $filePath               = $file->store('foto_pleton', 'public');
                $edPeserta->foto_pleton = $filePath;
            }
            if ($request->hasFile('rekomendasi')) {
                if ($edPeserta->rekomendasi && \Storage::disk('public')->exists($edPeserta->rekomendasi)) {
                    \Storage::disk('public')->delete($edPeserta->rekomendasi);
                }
                $file                   = $request->file('rekomendasi');
                $filePath               = $file->store('rekomendasi', 'public');
                $edPeserta->rekomendasi = $filePath;
            }
        }
        $edPeserta->save();

        return redirect('/dashboard/administrasi/peserta')->with('success', 'Peserta yang Dipilih Telah Diperbarui!');
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

        $edPeserta = Peserta::findOrFail($id);
        $edPeserta->delete();

        return redirect('/dashboard/administrasi/peserta')->with('success', 'Peserta yang Dipilih Telah Dihapus!');
    }
}