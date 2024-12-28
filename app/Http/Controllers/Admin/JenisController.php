<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JenisStoreRequest;
use App\Http\Requests\Admin\JenisUpdateRequest;
use App\Models\Abaaba;
use App\Models\Jenis;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    protected $limit = 10;
    protected $fields = array('tingkatans.*','jenis.*');
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
        $tipe      = $request->query('tipe');
        $jenises = Jenis::join('tingkatans', 'jenis.tingkatan_id', '=', 'tingkatans.id')
            ->select('tingkatans.nama_tingkatan', 'jenis.*')
            ->orderby('jenis.tingkatan_id')
            ->orderby('jenis.urutan')
            ->orderby('jenis.tipe');
        // Filter berdasarkan pencarian (search)
        if ($search) {
            $jenises->where(function ($query) use ($search) {
                $query->where('jenis.jenis_name', 'like', "%$search%")
                    ->orWhere('jenis.urutan', 'like', "%$search%");
            });
        }
        // Filter berdasarkan tingkatan
        if ($tingkatan) {
            $jenises->where('tingkatans.id', $tingkatan);
        }
        // Filter berdasarkan tipe
        if ($tipe) {
            $jenises->where('jenis.tipe', $tipe);
        }

        $page           = $request->query('page', 1);
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $jenises        = $jenises->paginate($perPage, ['*'], 'page', $page);
        $tingkatans     = Tingkatan::orderBy('id')->get();

        // Definisikan tipe jenis aba-aba untuk dropdown filter
        $tipeOptions = [
            '1PBB'     => 'PBB',
            '2DANTON'  => 'DANTON',
            '3VARIASI' => 'VARIASI',
            '4FORMASI' => 'FORMASI',
        ];

        return view('pages.admin.jenis.data', [
            'title'          => 'Data Jenis Aba-Aba',
            'jenises'        => $jenises,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
            'search'         => $search,
            'tingkatan'      => $tingkatan,
            'tingkatans'     => $tingkatans,
            'tipe'           => $tipe,
            'tipeOptions'    => $tipeOptions,
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

        $tingkatans = Tingkatan::orderBy('id')->get();
        return view('pages.admin.jenis.create', [
            'title'      => 'Tambah Jenis Aba-Aba',
            'tingkatans' => $tingkatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $jenises               = new Jenis();
        $jenises->tingkatan_id = $request->tingkatan_id;
        $jenises->jenis_name   = $request->jenis_name;
        $jenises->urutan       = $request->urutan;
        $jenises->tipe         = $request->tipe;
        $jenises->save();
        return redirect('/dashboard/teknis/jenis')->with('success', "Tambah Jenis Aba-Aba Baru Berhasil");
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

        $jenises    = Jenis::FindOrFail($id);
        $tingkatans = Tingkatan::where('id', '=', $jenises->tingkatan_id)
            ->orderBy('id')
            ->first();
        $abaabas    = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.id', '=', $id)
            ->orderby('jenis.urutan')
            ->orderby('abaabas.urutan_abaaba')
            ->select('abaabas.*', 'jenis.jenis_name')
            ->get();

        return view('pages.admin.jenis.show', [
            'title'      => "Data Aba-Aba dari Jenis $jenises->jenis_name",
            'jenises'    => $jenises,
            'abaabas'    => $abaabas,
            'tingkatans' => $tingkatans,
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
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $jenises    = Jenis::FindOrFail($id);
        $tingkatans = Tingkatan::orderBy('id')->get();

        return view('pages.admin.jenis.edit', [
            'title'      => "Edit Jenis $jenises->jenis_name",
            'jenises'    => $jenises,
            'tingkatans' => $tingkatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JenisUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validated();
        $item          = Jenis::findOrFail($id);
        $item->update($validatedData);

        return redirect('/dashboard/teknis/jenis')->with('success', 'Jenis Aba-Aba yang Dipilih Telah Diperbarui!');
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

        $jenis = Jenis::findOrFail($id);
        $jenis->delete();
        
        return redirect('/dashboard/teknis/jenis')->with('success', 'Jenis Aba-Aba yang Dipilih Telah Dihapus!');
    }
}