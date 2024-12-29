<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NilaivarforStoreRequest;
use App\Models\Abaaba;
use App\Models\Jenis;
use App\Models\Nilaivarfor;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class NilaivarforsmpController extends Controller
{
    protected $limit = 10;
    protected $fields = array('nilaivarfors.*', 'abaabas.*', 'pletons.*');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->level !== '1ADMIN' && auth()->user()->level !== '3JURIVARFOR') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        $query = Nilaivarfor::join('pesertas', 'nilaivarfors.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->join('tingkatans', 'pesertas.tingkatan_id', '=', 'tingkatans.id')
            ->select('pesertas.id', 'pesertas.no_urut', 'pesertas.user_id', 'users.name')
            ->where('tingkatans.id', '=', 2)
            ->distinct();

        // Filter berdasarkan level pengguna
        if (auth()->user()->level === '3JURIVARFOR') {
            $query->where('nilaivarfors.user_id', '=', auth()->user()->id);
        }

        $nilaivarfors = $query->get();

        return view('pages.admin.variasiformasi.smp.data', [
            'title'        => 'Data Nilai Variasi dan Formasi',
            'nilaivarfors' => $nilaivarfors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== '3JURIVARFOR') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $nilaivarfors = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
            ->whereNotIn('pesertas.id', function ($query) {
                $query->select('peserta_id')
                    ->from('nilaivarfors')
                    ->where('user_id', auth()->id());
            })
            ->select('pesertas.id', 'pesertas.no_urut', 'users.name')
            ->orderby('pesertas.no_urut')
            ->get();

        $variasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->join('penilaians', 'abaabas.id', '=', 'penilaians.abaaba_id')
            ->join('tingkatans', 'jenis.tingkatan_id', '=', 'tingkatans.id')
            ->where('tingkatans.nama_tingkatan', '=', 'SMP/MTs Sederajat')
            ->where('jenis.tipe', '=', '3VARIASI')
            ->select('abaabas.*', 'jenis.jenis_name', 'penilaians.skala1', 'penilaians.skala2', 'penilaians.skala3', 'penilaians.skala4', 'penilaians.skala5', 'penilaians.skala6', 'penilaians.skala7')
            ->orderby('jenis.urutan')
            ->orderby('abaabas.urutan_abaaba')
            ->get();

        $formasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->join('penilaians', 'abaabas.id', '=', 'penilaians.abaaba_id')
            ->join('tingkatans', 'jenis.tingkatan_id', '=', 'tingkatans.id')
            ->where('tingkatans.nama_tingkatan', '=', 'SMP/MTs Sederajat')
            ->where('jenis.tipe', '=', '4FORMASI')
            ->select('abaabas.*', 'jenis.jenis_name', 'penilaians.skala1', 'penilaians.skala2', 'penilaians.skala3', 'penilaians.skala4', 'penilaians.skala5', 'penilaians.skala6', 'penilaians.skala7')
            ->orderby('jenis.urutan')
            ->orderby('abaabas.urutan_abaaba')
            ->get();

        return view('pages.admin.variasiformasi.smp.create', [
            'title'        => 'Tambah Form Nilai',
            'nilaivarfors' => $nilaivarfors,
            'variasis'     => $variasis,
            'formasis'     => $formasis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaivarforStoreRequest $request)
    {
        if (auth()->user()->level !== '3JURIVARFOR') {
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

            Nilaivarfor::create($data);
        }

        return redirect('/dashboard/variasi-formasi/smp')->with('success', 'Nilai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (auth()->user()->level !== '1ADMIN' && auth()->user()->level !== '3JURIVARFOR') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }
        
        $jenisVariasis = Jenis::where('tipe', '=', '3VARIASI')
            ->whereHas('tingkatan', function ($query) {
                $query->where('id', 2);
            })
            ->orderBy('urutan')
            ->get();
        $jenisFormasis = Jenis::where('tipe', '=', '4FORMASI')
            ->whereHas('tingkatan', function ($query) {
                $query->where('id', 2);
            })
            ->orderBy('urutan')
            ->get();
        
        $juris = User::where('level', '=', '3JURIVARFOR')->get();
        $edPeserta = User::FindOrFail($id);
        $peserta = Peserta::where('user_id', '=', $id)->first();
        $abaabaVariasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '3VARIASI')
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderby('abaabas.urutan_abaaba')
            ->get();
        $abaabaFormasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '4FORMASI')
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderby('abaabas.urutan_abaaba')
            ->get();
        $nilaivarfors = Nilaivarfor::join('abaabas', 'nilaivarfors.abaaba_id', '=', 'abaabas.id')
            ->join('pesertas', 'nilaivarfors.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.user_id', '=', $id)
            ->select('nilaivarfors.*', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderby('abaabas.urutan_abaaba')
            ->get();
        
        if (auth()->user()->level === '3JURIVARFOR'){
            $title = "Nilai Variasi dan Formasi: Pleton No. Urut $peserta->no_urut";
        }else{
            $title = "Nilai Variasi dan Formasi $edPeserta->name";
        }

        return view('pages.admin.variasiformasi.smp.show', [
            'title'          => $title,
            'abaabaVariasis' => $abaabaVariasis,
            'abaabaFormasis' => $abaabaFormasis,
            'juris'          => $juris,
            'jenisVariasis'  => $jenisVariasis,
            'jenisFormasis'  => $jenisFormasis,
            'nilaivarfors'   => $nilaivarfors,
            'id'             => $id,
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
        $nilaivarfors = Nilaivarfor::where('peserta_id', $peserta_id);

        // Periksa apakah ada data yang ditemukan
        if ($nilaivarfors->exists()) {
            // Hapus semua data dengan peserta_id yang sesuai
            $nilaivarfors->delete();
            return redirect('/dashboard/variasi-formasi/smp')->with('success', 'Semua Nilai yang Berhubungan Telah Dihapus!');
        } else {
            return redirect('/dashboard/variasi-formasi/smp')->with('error', 'Tidak Ada Data Nilai yang Ditemukan!');
        }
    }
}