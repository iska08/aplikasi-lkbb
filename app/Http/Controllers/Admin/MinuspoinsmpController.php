<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MinuspoinStoreRequest;
use App\Models\Minuspoin;
use App\Models\Pengurangan;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class MinuspoinsmpController extends Controller
{
    protected $limit = 10;
    protected $fields = array('minuspoins.*', 'pengurangans.*');
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

        $minuspoins = Minuspoin::join('pesertas', 'minuspoins.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->join('tingkatans', 'pesertas.tingkatan_id', '=', 'tingkatans.id')    
            ->select('pesertas.id', 'pesertas.no_urut', 'pesertas.user_id', 'users.name')
            ->where('tingkatans.nama_tingkatan',  '=', 'SMP/MTs Sederajat')
            ->distinct()
            ->get();

        return view('pages.admin.minuspoin.smp.data', [
            'title'      => 'Data Pengurangan Nilai',
            'minuspoins' => $minuspoins,
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

        $minuspoins = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
            ->whereNotIn('pesertas.id', function ($query) {
                $query->select('peserta_id')
                    ->from('minuspoins')
                    ->where('user_id', auth()->id());
            })
            ->select('pesertas.id', 'pesertas.no_urut', 'users.name')
            ->orderby('pesertas.no_urut')
            ->get();

        return view('pages.admin.minuspoin.smp.create', [
            'title'        => 'Tambah Pengurangan Nilai',
            'minuspoins'   => $minuspoins,
            'pengurangans' => Pengurangan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MinuspoinStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        // Validasi input
        $validatedData = $request->validated();

        // Pastikan semua array memiliki jumlah elemen yang sama
        if (
            count($validatedData['pengurangan_id']) !== count($validatedData['minus']) || 
            count($validatedData['pengurangan_id']) !== count($validatedData['jumlah'])
        ) {
            return redirect()->back()->with('error', 'Data pengurangan nilai tidak valid.');
        }

        // Loop melalui data pengurangan
        foreach ($validatedData['pengurangan_id'] as $key => $pengurangan_id) {
            // Pastikan setiap elemen array memiliki nilai valid
            $data = [
                'peserta_id'     => $validatedData['peserta_id'],
                'user_id'        => auth()->id(),
                'pengurangan_id' => $pengurangan_id ?? null,
                'minus'          => $validatedData['minus'][$key] ?? 0,
                'jumlah'         => $validatedData['jumlah'][$key] ?? 0,
            ];

            // Simpan data ke dalam database
            Minuspoin::create($data);
        }

        return redirect('/dashboard/minus-poin/smp')->with('success', 'Pengurangan Nilai Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta      = Peserta::where('id', '=', $id)->first();
        $edPeserta    = User::findOrFail($peserta->user_id); // Pastikan ID peserta diambil dari relasi
        $pengurangans = Minuspoin::join('pengurangans', 'minuspoins.pengurangan_id', '=', 'pengurangans.id')
            ->join('pesertas', 'minuspoins.peserta_id', '=', 'pesertas.id')
            ->join('users', 'minuspoins.user_id', '=', 'users.id')
            ->where('pesertas.id', '=', $id) // Gunakan ID peserta
            ->select('minuspoins.minus', 'minuspoins.jumlah', 'pengurangans.*')
            ->orderby('pengurangans.id')
            ->get(); // Pastikan query dieksekusi dengan `get()`

        if (auth()->user()->level === '1ADMIN') {
            $title = "Pengurangan Nilai: Pleton No. Urut $peserta->no_urut";
        } else {
            $title = "Nilai PBB dan Danton $edPeserta->name";
        }

        return view('pages.admin.minuspoin.smp.show', [
            'title'        => $title,
            'id'           => $id,
            'pengurangans' => $pengurangans,
        ]);
    }

    public function edit($id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Izin Untuk Melakukan Tindakan Ini.');
        }

        // Ambil data peserta berdasarkan ID
        $peserta = Peserta::where('id', '=', $id)->first();
        if (!$peserta) {
            return redirect()->back()->with('error', 'Peserta Tidak Ditemukan.');
        }

        // Ambil data yang sudah disimpan untuk peserta ini
        $minuspoins = Minuspoin::join('pengurangans', 'minuspoins.pengurangan_id', '=', 'pengurangans.id')
            ->where('peserta_id', '=', $id)
            ->select('minuspoins.*', 'pengurangans.keterangan', 'pengurangans.poin', 'pengurangans.per')
            ->get();

        return view('pages.admin.minuspoin.smp.edit', [
            'title'      => "Edit Pengurangan Nilai - Pleton No. Urut $peserta->no_urut",
            'peserta'    => $peserta,
            'minuspoins' => $minuspoins,
        ]);
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Izin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validate([
            'minuspoins.*.id'      => 'required|exists:minuspoins,id',
            'minuspoins.*.jumlah'  => 'required|numeric|min:0',
        ]);

        foreach ($validatedData['minuspoins'] as $data) {
            // Perbarui data untuk setiap pengurangan nilai
            $minuspoin = Minuspoin::find($data['id']);
            if ($minuspoin) {
                $minuspoin->update([
                    'jumlah' => $data['jumlah'],
                ]);
            }
        }

        return redirect('/dashboard/minus-poin/smp')->with('success', 'Pengurangan Nilai Berhasil Diperbarui!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($peserta_id)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Izin Untuk Melakukan Tindakan Ini.');
        }

        // Cari semua data dengan peserta_id yang sesuai
        $minuspoins = Minuspoin::where('peserta_id', $peserta_id);

        // Periksa apakah ada data yang ditemukan
        if ($minuspoins->exists()) {
            // Hapus semua data dengan peserta_id yang sesuai
            $minuspoins->delete();
            return redirect('/dashboard/minus-poin/smp')->with('success', 'Semua Nilai yang Berhubungan Telah Dihapus!');
        } else {
            return redirect('/dashboard/minus-poin/smp')->with('error', 'Tidak Ada Data Nilai yang Ditemukan!');
        }
    }
}