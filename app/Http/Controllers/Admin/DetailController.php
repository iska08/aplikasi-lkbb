<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DetailStoreRequest;
use App\Http\Requests\Admin\DetailUpdateRequest;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DetailController extends Controller
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
        return view('pages.admin.detail.data', [
            'title'   => 'Detail LKBB',
            'details' => Detail::all(),
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
        
        if (Detail::count() > 0) {
            return redirect('/dashboard/internal/detail')->with('error', 'Detail LKBB sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }

        return view('pages.admin.detail.create', [
            'title'   => 'Tambah Detail LKBB',
            'details' => Detail::first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        if (Detail::count() > 0) {
            return redirect('/dashboard/internal/detail')->with('error', 'Detail LKBB sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }
        
        $details                  = new Detail();
        $details->cakupan         = $request->cakupan;
        $details->alamat          = $request->alamat;
        $details->maps            = $request->maps;
        $details->keterangan_lkbb = $request->keterangan_lkbb;
        $details->total_pembinaan = $request->total_pembinaan;
        $details->htm             = $request->htm;
        $details->save();

        return redirect('/dashboard/internal/detail')->with('success', 'Detail LKBB Berhasil Ditambahkan.');
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

        $details = Detail::FindOrFail($id);
        return view('pages.admin.detail.edit', [
            'title'   => "Edit Detail LKBB",
            'details' => $details,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(DetailUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $details                  = Detail::FindOrFail($id);
        $details->cakupan         = $request->cakupan;
        $details->alamat          = $request->alamat;
        $details->maps            = $request->maps;
        $details->keterangan_lkbb = $request->keterangan_lkbb;
        $details->total_pembinaan = $request->total_pembinaan;
        $details->htm             = $request->htm;
        $details->save();

        return redirect('/dashboard/internal/detail')->with('success', 'Detail Telah Diperbarui!');
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

        $details = Detail::FindOrFail($id);
        $details->delete();

        return redirect('/dashboard/internal/detail')->with('success', 'Detail yang Dipilih Telah Dihapus!');
    }
}