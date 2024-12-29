<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SosmedStoreRequest;
use App\Http\Requests\Admin\SosmedUpdateRequest;
use App\Models\Sosmed;

class SosmedController extends Controller
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
        
        return view('pages.admin.sosmed.data', [
            'title'   => 'Data Sosial Media',
            'sosmeds' => Sosmed::all(),
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
        
        if (Sosmed::count() > 0) {
            return redirect('/dashboard/internal/sosmed')->with('error', 'Sosial Media sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }

        return view('pages.admin.sosmed.create', [
            'title'   => 'Tambah Sosial Media',
            'sosmeds' => Sosmed::first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SosmedStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SosmedStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        if (Sosmed::count() > 0) {
            return redirect('/dashboard/internal/sosmed')->with('error', 'Sosial Media sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }
        
        $sosmeds            = new Sosmed();
        $sosmeds->email     = $request->email;
        $sosmeds->facebook  = $request->facebook;
        $sosmeds->instagram = $request->instagram;
        $sosmeds->tiktok    = $request->tiktok;
        $sosmeds->twitter   = $request->twitter;
        $sosmeds->youtube   = $request->youtube;
        $sosmeds->save();
        
        return redirect('/dashboard/internal/sosmed')->with('success', 'Sosial Media Berhasil Ditambahkan.');
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

        $sosmeds = Sosmed::FindOrFail($id);
        return view('pages.admin.sosmed.edit', [
            'title'   => "Edit Sosial Media",
            'sosmeds' => $sosmeds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SosmedUpdateRequest $request
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function update(SosmedUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $sosmeds            = Sosmed::FindOrFail($id);
        $sosmeds->email     = $request->email;
        $sosmeds->facebook  = $request->facebook;
        $sosmeds->instagram = $request->instagram;
        $sosmeds->tiktok    = $request->tiktok;
        $sosmeds->twitter   = $request->twitter;
        $sosmeds->youtube   = $request->youtube;
        $sosmeds->save();

        return redirect('/dashboard/internal/sosmed')->with('success', 'Sosial Media Telah Diperbarui!');
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

        $sosmeds = Sosmed::FindOrFail($id);
        $sosmeds->delete();

        return redirect('/dashboard/internal/sosmed')->with('success', 'Berkas Telah Dihapus!');
    }
}
