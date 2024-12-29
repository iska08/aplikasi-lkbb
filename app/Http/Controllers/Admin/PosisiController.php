<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PosisiStoreRequest;
use App\Http\Requests\Admin\PosisiUpdateRequest;
use App\Models\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    protected $limit = 10;
    protected $fields = array('posisis.*');
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
        
        $page           = $request->query('page', 1);
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $posisis        = Posisi::orderBy('nama_posisi')->paginate($perPage, ['*'], 'page', $page);
        
        return view('pages.admin.posisi.data', [
            'title'          => 'Data Posisi',
            'posisis'        => $posisis,
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

        return view('pages.admin.posisi.create', [
            'title'      => 'Tambah Posisi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PosisiStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $posisis              = new Posisi();
        $posisis->nama_posisi = $request->nama_posisi;
        $posisis->keterangan  = $request->keterangan;
        $posisis->save();

        return redirect('/dashboard/teknis/posisi')->with('success', "Tambah Posisi Baru Berhasil");
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

        $posisis = Posisi::FindOrFail($id);

        return view('pages.admin.posisi.edit', [
            'title'      => "Edit Posisi $posisis->nama_posisi",
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

    public function update(PosisiUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validated();
        $item = Posisi::findOrFail($id);
        $item->update($validatedData);

        return redirect('/dashboard/teknis/posisi')->with('success', 'Posisi yang Dipilih Telah Diperbarui!');
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

        $posisis = Posisi::findOrFail($id);
        $posisis->delete();

        return redirect('/dashboard/teknis/posisi')->with('success', 'Posisi yang Dipilih Telah Dihapus!');
    }
}