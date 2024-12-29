<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TingkatanStoreRequest;
use App\Http\Requests\Admin\TingkatanUpdateRequest;
use App\Models\Tingkatan;

class TingkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        return view('pages.admin.tingkatan.data', [
            'title'      => 'Data Tingkatan',
            'tingkatans' => Tingkatan::all(),
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

        $existingTingkatans = Tingkatan::pluck('nama_tingkatan')->toArray();
        return view('pages.admin.tingkatan.create', [
            'title'              => 'Tambah Tingkatan',
            'existingTingkatans' => $existingTingkatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TingkatanStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $tingkatans                 = new Tingkatan();
        $tingkatans->nama_tingkatan = $request->nama_tingkatan;
        $tingkatans->save();

        return redirect('/dashboard/teknis/tingkatan')->with('success', "Tambah Tingkatan Baru Berhasil");
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

        $tingkatans         = Tingkatan::FindOrFail($id);
        $existingTingkatans = Tingkatan::where('id', '!=', $id)->pluck('nama_tingkatan')->toArray();
        return view('pages.admin.tingkatan.edit', [
            'title'              => "Edit Tingkatan $tingkatans->nama_tingkatan",
            'tingkatans'         => $tingkatans,
            'existingTingkatans' => $existingTingkatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(TingkatanUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validated();
        $item = Tingkatan::findOrFail($id);
        $item->update($validatedData);

        return redirect('/dashboard/teknis/tingkatan')->with('success', 'Tingkatan yang Dipilih Telah Diperbarui!');
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

        $tingkatans = Tingkatan::findOrFail($id);
        $tingkatans->delete();

        return redirect('/dashboard/teknis/tingkatan')->with('success', 'Tingkatan yang Dipilih Telah Dihapus!');
    }
}