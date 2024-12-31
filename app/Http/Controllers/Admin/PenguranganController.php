<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenguranganStoreRequest;
use App\Http\Requests\Admin\PenguranganUpdateRequest;
use App\Models\Pengurangan;
use Illuminate\Http\Request;

class PenguranganController extends Controller
{
    protected $limit = 10;
    protected $fields = array('pengurangans.*');
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
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage = $request->query('perPage', $perPageOptions[1]);
        // Query data Pengurangan
        $pengurangans = Pengurangan::query();
        // Filter berdasarkan pencarian (search)
        if ($search) {
            $pengurangans->where(function ($query) use ($search) {
                $query->where('keterangan', 'like', "%$search%")
                    ->orWhere('per', 'like', "%$search%")
                    ->orWhere('poin', 'like', "%$search%");
            });
        }
        // Paginate data
        $pengurangans = $pengurangans->orderBy('id')->paginate($perPage);
        return view('pages.admin.pengurangan.data', [
            'title'          => 'Detail Pengurangan Nilai',
            'pengurangans'   => $pengurangans,
            'search'         => $search,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
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

        return view('pages.admin.pengurangan.create', [
            'title'           => 'Tambah Detail Pengurangan Nilai',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenguranganStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $pengurangans             = new Pengurangan();
        $pengurangans->keterangan = $request->keterangan;
        $pengurangans->per        = $request->per;
        $pengurangans->poin       = $request->poin;
        $pengurangans->save();

        return redirect('/dashboard/teknis/pengurangan')->with('success', "Tambah Detail Pengurangan Nilai Baru Berhasil");
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

        $pengurangans = Pengurangan::FindOrFail($id);
        return view('pages.admin.pengurangan.edit', [
            'title'        => 'Edit Pengurangan',
            'pengurangans' => $pengurangans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PenguranganUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $pengurangans             = Pengurangan::FindOrFail($id);
        $pengurangans->keterangan = $request->keterangan;
        $pengurangans->per        = $request->per;
        $pengurangans->poin       = $request->poin;
        $pengurangans->save();

        return redirect('/dashboard/teknis/pengurangan')->with('success', 'Detail Pengurangan Nilai yang Dipilih Telah Diperbarui!');
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

        $pengurangans = Pengurangan::findOrFail($id);
        $pengurangans->delete();

        return redirect('/dashboard/teknis/pengurangan')->with('success', 'Detail Pengurangan Nilai yang Dipilih Telah Diperbarui!');
    }
}