<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CpStoreRequest;
use App\Http\Requests\Admin\CpUpdateRequest;
use App\Models\Cp;
use Illuminate\Http\Request;

class CpController extends Controller
{
    protected $limit = 10;
    protected $fields = array('contactpersons.*');
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
        $search = $request->query('search');
        $peran  = $request->query('peran');
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage = $request->query('perPage', $perPageOptions[1]);
        // Query data CP
        $cps = Cp::query();
        // Filter berdasarkan pencarian (search)
        if ($search) {
            $cps->where(function ($query) use ($search) {
                $query->where('nama_cp', 'like', "%$search%")
                    ->orWhere('noHp', 'like', "%$search%")
                    ->orWhere('peran', 'like', "%$search%");
            });
        }
        // Filter berdasarkan peran
        if ($peran) {
            $cps->where('peran', $peran);
        }
        // Paginate data
        $cps = $cps->orderBy('id')->paginate($perPage);
        // Ambil semua opsi peran untuk dropdown
        $perans = Cp::select('peran')->get();
        return view('pages.admin.cp.data', [
            'title'          => 'Data CP',
            'cps'            => $cps,
            'search'         => $search,
            'peran'          => $peran,
            'perans'         => $perans,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
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

        return view('pages.admin.cp.create', [
            'title'      => 'Tambah CP',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CpStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $cps          = new Cp();
        $cps->nama_cp = $request->nama_cp;
        $cps->noHp    = $request->noHp;
        $cps->peran   = $request->peran;
        $cps->save();

        return redirect('/dashboard/teknis/cp')->with('success', "Tambah CP Baru Berhasil");
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
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $cps = Cp::FindOrFail($id);
        return view('pages.admin.cp.edit', [
            'title'      => "Edit CP: $cps->nama_cp",
            'cps'        => $cps,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(CpUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $cps = Cp::FindOrFail($id);
        $cps->nama_cp = $request->nama_cp;
        $cps->noHp    = $request->noHp;
        $cps->peran   = $request->peran;
        $cps->save();

        return redirect('/dashboard/teknis/cp')->with('success', 'CP yang Dipilih Telah Diperbarui!');
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

        $cps = Cp::findOrFail($id);
        $cps->delete();

        return redirect('/dashboard/teknis/cp')->with('success', 'CP yang Dipilih Telah Dihapus!');
    }
}