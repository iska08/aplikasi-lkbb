<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BenefitStoreRequest;
use App\Http\Requests\Admin\BenefitUpdateRequest;
use App\Models\Benefit;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    protected $limit = 10;
    protected $fields = array('tingkatans.*', 'benefits.*');
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
        $search   = $request->query('search');
        $tingkatan = $request->query('tingkatan');
        $benefits = Benefit::join('tingkatans', 'benefits.tingkatan_id', '=', 'tingkatans.id')
            ->select('benefits.*', 'tingkatans.nama_tingkatan')
            ->orderby('benefits.tingkatan_id')
            ->orderby('benefits.prioritas');
        
        // Filter berdasarkan pencarian (search)
        if ($search) {
            $benefits->where(function ($query) use ($search) {
                $query->where('benefits.nama_juara', 'like', "%$search%")
                    ->orWhere('benefits.trophy', 'like', "%$search%")
                    ->orWhere('benefits.hadiah', 'like', "%$search%")
                    ->orWhere('benefits.uang', 'like', "%$search%");
            });
        }

        // Filter berdasarkan tingkatan
        if ($tingkatan) {
            $benefits->where('tingkatans.id', $tingkatan);
        }

        $page           = $request->query('page', 1);
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $benefits       = $benefits->paginate($perPage, ['*'], 'page', $page);
        $tingkatans     = Tingkatan::orderBy('id')->get();

        return view('pages.admin.benefit.data', [
            'title'          => 'Data Benefit',
            'benefits'       => $benefits,
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

        $tingkatans = Tingkatan::orderBy('id')->get();
        return view('pages.admin.benefit.create', [
            'title'      => 'Tambah Benefit',
            'tingkatans' => $tingkatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BenefitStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BenefitStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $benefits               = new Benefit();
        $benefits->tingkatan_id = $request->tingkatan_id;
        $benefits->nama_juara   = $request->nama_juara;
        $benefits->trophy       = $request->trophy;
        $benefits->hadiah       = $request->hadiah;
        $benefits->uang         = $request->uang;
        $benefits->prioritas    = $request->prioritas;
        $benefits->save();
        return redirect('/dashboard/internal/benefit')->with('success', "Tambah Benefit Baru Berhasil");
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
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $benefits   = Benefit::FindOrFail($id);
        $tingkatans = Tingkatan::orderBy('id')->get();

        return view('pages.admin.benefit.edit', [
            'title'      => "Edit Benefit $benefits->nama_juara",
            'benefits'   => $benefits,
            'tingkatans' => $tingkatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BenefitUpdateRequest $request
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function update(BenefitUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validated();
        $item          = Benefit::findOrFail($id);
        $item->update($validatedData);

        return redirect('/dashboard/internal/benefit')->with('success', 'Benefit yang Dipilih Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $benefits = Benefit::FindOrFail($id);
        $benefits->delete();
        
        return redirect('/dashboard/internal/benefit')->with('success', 'Benefit yang Dipilih Telah Dihapus!');
    }
}
