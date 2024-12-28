<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BerkasStoreRequest;
use App\Http\Requests\Admin\BerkasUpdateRequest;
use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BerkasController extends Controller
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
        
        return view('pages.admin.berkas.data', [
            'title'    => 'Data Berkas',
            'berkases' => Berkas::all(),
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
        
        if (Berkas::count() > 0) {
            return redirect('/dashboard/internal/berkas')->with('error', 'Berkas LKBB sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }

        return view('pages.admin.berkas.create', [
            'title'    => 'Tambah Berkas LKBB',
            'berkases' => Berkas::first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BerkasStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BerkasStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        if (Berkas::count() > 0) {
            return redirect('/dashboard/internal/berkas')->with('error', 'Berkas LKBB sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }
        
        $berkases         = new Berkas();
        $berkases->poster = $request->poster;
        $berkases->rekom  = $request->rekom;
        $berkases->juknis = $request->juknis;
        $berkases->save();
        
        return redirect('/dashboard/internal/berkas')->with('success', 'Berkas LKBB Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $berkases = Berkas::FindOrFail($id);
        return view('pages.admin.berkas.edit', [
            'title'    => "Edit Berkas LKBB",
            'berkases' => $berkases,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BerkasUpdateRequest  $request
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function update(BerkasUpdateRequest  $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $berkases         = Berkas::FindOrFail($id);
        $berkases->poster = $request->poster;
        $berkases->rekom  = $request->rekom;
        $berkases->juknis = $request->juknis;
        $berkases->save();

        return redirect('/dashboard/internal/berkas')->with('success', 'Berkas Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $berkases = Berkas::FindOrFail($id);
        $berkases->delete();

        return redirect('/dashboard/internal/berkas')->with('success', 'Berkas Telah Dihapus!');
    }
}
