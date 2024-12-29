<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NilaipbbdantonStoreRequest;
use App\Models\Abaaba;
use App\Models\Jenis;
use App\Models\Nilaipbbdanton;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class NilaipbbdantonsmpController extends Controller
{
    protected $limit = 10;
    protected $fields = array('nilaipbbdantons.*', 'abaabas.*', 'pletons.*');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->level !== '1ADMIN' && auth()->user()->level !== '2JURIPBB') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $query = Nilaipbbdanton::join('pesertas', 'nilaipbbdantons.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->join('tingkatans', 'pesertas.tingkatan_id', '=', 'tingkatans.id')
            ->select('pesertas.id', 'pesertas.no_urut', 'pesertas.user_id', 'users.name')
            ->where('tingkatans.nama_tingkatan', '=', 'SMP/MTs Sederajat')
            ->distinct();

        // Filter berdasarkan level pengguna
        if (auth()->user()->level === '2JURIPBB') {
            $query->where('nilaipbbdantons.user_id', '=', auth()->user()->id);
        }

        $nilaipbbdantons = $query->get();

        return view('pages.admin.pbbdanton.smp.data', [
            'title'           => 'Data Nilai PBB dan Danton',
            'nilaipbbdantons' => $nilaipbbdantons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== '2JURIPBB') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $nilaipbbdantons = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
            ->whereNotIn('pesertas.id', function ($query) {
                $query->select('peserta_id')
                    ->from('nilaipbbdantons')
                    ->where('user_id', auth()->id());
            })
            ->select('pesertas.id', 'pesertas.no_urut', 'users.name')
            ->orderby('pesertas.no_urut')
            ->get();

        $pbbs = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->join('penilaians', 'abaabas.id', '=', 'penilaians.abaaba_id')
            ->join('tingkatans', 'jenis.tingkatan_id', '=', 'tingkatans.id')
            ->where('tingkatans.nama_tingkatan', '=', 'SMP/MTs Sederajat')
            ->where('jenis.tipe', '=', '1PBB')
            ->select('abaabas.*', 'jenis.jenis_name', 'penilaians.skala1', 'penilaians.skala2', 'penilaians.skala3', 'penilaians.skala4', 'penilaians.skala5', 'penilaians.skala6', 'penilaians.skala7')
            ->orderby('jenis.urutan')
            ->orderby('abaabas.urutan_abaaba')
            ->get();

        $dantons = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->join('penilaians', 'abaabas.id', '=', 'penilaians.abaaba_id')
            ->join('tingkatans', 'jenis.tingkatan_id', '=', 'tingkatans.id')
            ->where('tingkatans.nama_tingkatan', '=', 'SMP/MTs Sederajat')
            ->where('jenis.tipe', '=', '2DANTON')
            ->select('abaabas.*', 'jenis.jenis_name', 'penilaians.skala1', 'penilaians.skala2', 'penilaians.skala3', 'penilaians.skala4', 'penilaians.skala5', 'penilaians.skala6', 'penilaians.skala7')
            ->orderby('jenis.urutan')
            ->orderby('abaabas.urutan_abaaba')
            ->get();

        return view('pages.admin.pbbdanton.smp.create', [
            'title'           => 'Tambah Form Nilai',
            'nilaipbbdantons' => $nilaipbbdantons,
            'pbbs'            => $pbbs,
            'dantons'         => $dantons,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaipbbdantonStoreRequest $request)
    {
        if (auth()->user()->level !== '2JURIPBB') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validated();

        foreach ($validatedData['abaaba_id'] as $key => $abaaba_id) {
            $data = [
                'peserta_id' => $validatedData['peserta_id'],
                'user_id'    => auth()->id(),
                'abaaba_id'  => $abaaba_id,
                'points'     => $validatedData['points'][$key],
            ];

            Nilaipbbdanton::create($data);
        }

        return redirect('/dashboard/pbb-danton/smp')->with('success', 'Nilai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN' && auth()->user()->level !== '2JURIPBB') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        $jenisPBBs = Jenis::where('tipe', '=', '1PBB')
            ->whereHas('tingkatan', function ($query) {
                $query->where('nama_tingkatan', 'SMP/MTs Sederajat');
            })
            ->orderBy('urutan')
            ->get();
        $jenisDantons = Jenis::where('tipe', '=', '2DANTON')
            ->whereHas('tingkatan', function ($query) {
                $query->where('nama_tingkatan', 'SMP/MTs Sederajat');
            })
            ->orderBy('urutan')
            ->get();
        
        $juris = User::where('level', '=', '2JURIPBB')->get();
        $edPeserta = User::FindOrFail($id);
        $peserta = Peserta::where('user_id', '=', $id)->first();
        $abaabaPBBs = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '1PBB')
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderby('abaabas.urutan_abaaba')
            ->get();
        $abaabaDantons = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '2DANTON')
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderby('abaabas.urutan_abaaba')
            ->get();
        $nilaipbbdantons = Nilaipbbdanton::join('abaabas', 'nilaipbbdantons.abaaba_id', '=', 'abaabas.id')
            ->join('pesertas', 'nilaipbbdantons.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.user_id', '=', $id)
            ->select('nilaipbbdantons.*', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderby('abaabas.urutan_abaaba')
            ->get();
        
        if (auth()->user()->level === '2JURIPBB'){
            $title = "Nilai PBB dan Danton: Pleton No. Urut $peserta->no_urut";
        }else{
            $title = "Nilai PBB dan Danton $edPeserta->name";
        }

        return view('pages.admin.pbbdanton.smp.show', [
            'title'           => $title,
            'abaabaPBBs'      => $abaabaPBBs,
            'abaabaDantons'   => $abaabaDantons,
            'juris'           => $juris,
            'jenisPBBs'       => $jenisPBBs,
            'jenisDantons'    => $jenisDantons,
            'nilaipbbdantons' => $nilaipbbdantons,
            'id'              => $id,
        ]);
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
        $nilaipbbdantons = Nilaipbbdanton::where('peserta_id', $peserta_id);

        // Periksa apakah ada data yang ditemukan
        if ($nilaipbbdantons->exists()) {
            // Hapus semua data dengan peserta_id yang sesuai
            $nilaipbbdantons->delete();
            return redirect('/dashboard/pbb-danton/smp')->with('success', 'Semua Nilai yang Berhubungan Telah Dihapus!');
        } else {
            return redirect('/dashboard/pbb-danton/smp')->with('error', 'Tidak Ada Data Nilai yang Ditemukan!');
        }
    }
}