<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TimelineStoreRequest;
use App\Http\Requests\Admin\TimelineUpdateRequest;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TimelineController extends Controller
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
        return view('pages.admin.timeline.data', [
            'title'     => 'Timeline LKBB',
            'timelines' => Timeline::all(),
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
        // Cek apakah data sudah ada
        if (Timeline::count() > 0) {
            return redirect('/dashboard/internal/timeline')->with('error', 'Timeline LKBB sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }
        return view('pages.admin.timeline.create', [
            'title'     => 'Tambah Timeline LKBB',
            'timelines' => Timeline::first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TimelineStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimelineStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        if (Timeline::count() > 0) {
            return redirect('/dashboard/internal/timeline')->with('error', 'Timeline LKBB sudah ada. Anda hanya dapat mengelola data yang sudah ada.');
        }
        
        $timelines                        = new Timeline();
        $timelines->tgl_pendaftaran_buka  = $request->tgl_pendaftaran_buka;
        $timelines->tgl_pendaftaran_tutup = $request->tgl_pendaftaran_tutup;
        $timelines->lokasi_pendaftaran    = $request->lokasi_pendaftaran;
        $timelines->tgl_tm                = $request->tgl_tm;
        $timelines->lokasi_tm             = $request->lokasi_tm;
        $timelines->tgl_pelaksanaan       = $request->tgl_pelaksanaan;
        $timelines->lokasi_pelaksanaan    = $request->lokasi_pelaksanaan;
        $timelines->save();
        
        return redirect('/dashboard/internal/timeline')->with('success', 'Timeline LKBB Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\$id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\$id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $timelines = Timeline::FindOrFail($id);
        return view('pages.admin.timeline.edit', [
            'title'     => "Edit Timeline LKBB",
            'timelines' => $timelines,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TimelineUpdateRequest  $request
     * @param  \App\Models\Admin\$id
     * @return \Illuminate\Http\Response
     */
    public function update(TimelineUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $timelines                        = Timeline::FindOrFail($id);
        $timelines->tgl_pendaftaran_buka  = $request->tgl_pendaftaran_buka;
        $timelines->tgl_pendaftaran_tutup = $request->tgl_pendaftaran_tutup;
        $timelines->lokasi_pendaftaran    = $request->lokasi_pendaftaran;
        $timelines->tgl_tm                = $request->tgl_tm;
        $timelines->lokasi_tm             = $request->lokasi_tm;
        $timelines->tgl_pelaksanaan       = $request->tgl_pelaksanaan;
        $timelines->lokasi_pelaksanaan    = $request->lokasi_pelaksanaan;
        $timelines->save();

        return redirect('/dashboard/internal/timeline')->with('success', 'Timeline Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\$id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $timelines = Timeline::FindOrFail($id);
        $timelines->delete();

        return redirect('/dashboard/internal/timeline')->with('success', 'Timeline Telah Dihapus!');
    }
}
