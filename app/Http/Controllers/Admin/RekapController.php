<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abaaba;
use App\Models\Benefit;
use App\Models\Jenis;
use App\Models\Minuspoin;
use App\Models\Nilaipbbdanton;
use App\Models\Nilaivarfor;
use App\Models\Peserta;
use App\Models\Setting;
use App\Models\Tingkatan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;

class RekapController extends Controller
{
    protected $fields = array('nilaipbbdantons.*', 'nilaivarfors.*', 'abaabas.*', 'pletons.*');

    public function index()
    {
        $id      = auth()->user()->id;
        $peserta = Peserta::where('user_id', '=', $id)->firstOrFail();
        $users   = $peserta->user_id;
        if (auth()->user()->id !== $users) {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Mengakses Data Ini.');
        }
        $tingkatanId = $peserta->tingkatan_id;
        $jenisPBBs = Jenis::where('tipe', '=', '1PBB')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $jenisDantons = Jenis::where('tipe', '=', '2DANTON')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $jenisVariasis = Jenis::where('tipe', '=', '3VARIASI')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $jenisFormasis = Jenis::where('tipe', '=', '4FORMASI')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $juriPDs = User::where('level', '=', '2JURIPBB')->get();
        $juriVFs = User::where('level', '=', '3JURIVARFOR')->get();
        $edPeserta = User::findOrFail($id);
        $abaabaPBBs = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '1PBB')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $abaabaDantons = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '2DANTON')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $abaabaVariasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '3VARIASI')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $abaabaFormasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '4FORMASI')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.id', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $nilaipbbdantons = Nilaipbbdanton::join('abaabas', 'nilaipbbdantons.abaaba_id', '=', 'abaabas.id')
            ->join('pesertas', 'nilaipbbdantons.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.user_id', '=', $id)
            ->select('nilaipbbdantons.*', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $nilaivarfors = Nilaivarfor::join('abaabas', 'nilaivarfors.abaaba_id', '=', 'abaabas.id')
            ->join('pesertas', 'nilaivarfors.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.user_id', '=', $id)
            ->select('nilaivarfors.*', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $pengurangans = Minuspoin::join('pengurangans', 'minuspoins.pengurangan_id', '=', 'pengurangans.id')
            ->join('pesertas', 'minuspoins.peserta_id', '=', 'pesertas.id')
            ->join('users', 'minuspoins.user_id', '=', 'users.id')
            ->where('pesertas.id', '=', $peserta->id)
            ->select('minuspoins.minus', 'minuspoins.jumlah', 'pengurangans.*')
            ->orderby('pengurangans.id')
            ->get();

        return view('pages.admin.rekap.nilaipeserta', [
            'title'           => "Rekap Nilai $edPeserta->name",
            'abaabaPBBs'      => $abaabaPBBs,
            'abaabaDantons'   => $abaabaDantons,
            'abaabaVariasis'  => $abaabaVariasis,
            'abaabaFormasis'  => $abaabaFormasis,
            'juriPDs'         => $juriPDs,
            'juriVFs'         => $juriVFs,
            'jenisPBBs'       => $jenisPBBs,
            'jenisDantons'    => $jenisDantons,
            'jenisVariasis'   => $jenisVariasis,
            'jenisFormasis'   => $jenisFormasis,
            'nilaipbbdantons' => $nilaipbbdantons,
            'nilaivarfors'    => $nilaivarfors,
            'pengurangans'    => $pengurangans,
            'id'              => $id,
        ]);
    }

    public function nilaiPesertaPdf()
    {
        $id      = auth()->user()->id;
        set_time_limit(300);
        $peserta = Peserta::where('user_id', '=', $id)->firstOrFail();
        $users   = $peserta->user_id;
        if (auth()->user()->id !== $users) {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Mengakses Data Ini.');
        }
        $pdfData = $this->generateNilaiPesertaPDF($id);
        // Load view ke dalam PDF
        $pdf = PDF::loadView('pages.admin.rekap.nilaipesertapdf', $pdfData);
        // Menampilkan PDF di browser
        return $pdf->stream("rekap_nilai_peserta_{$pdfData['edPeserta']->name}.pdf");
    }

    private function generateNilaiPesertaPDF()
    {
        $id      = auth()->user()->id;
        $peserta = Peserta::where('user_id', '=', $id)->firstOrFail();
        $tingkatanId = $peserta->tingkatan_id;
        $jenisPBBs = Jenis::where('tipe', '=', '1PBB')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $jenisDantons = Jenis::where('tipe', '=', '2DANTON')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $jenisVariasis = Jenis::where('tipe', '=', '3VARIASI')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $jenisFormasis = Jenis::where('tipe', '=', '4FORMASI')
            ->whereHas('tingkatan', function ($query) use ($tingkatanId) {
                $query->where('id', $tingkatanId);
            })
            ->orderBy('urutan')
            ->get();
        $juriPDs = User::where('level', '=', '2JURIPBB')->get();
        $juriVFs = User::where('level', '=', '3JURIVARFOR')->get();
        $edPeserta = User::findOrFail($id);
        $abaabaPBBs = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '1PBB')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.*')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $abaabaDantons = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '2DANTON')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.*')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $abaabaVariasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '3VARIASI')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.*')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $abaabaFormasis = Abaaba::join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
            ->where('jenis.tipe', '=', '4FORMASI')
            ->where('jenis.tingkatan_id', '=', $tingkatanId)
            ->select('abaabas.*')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $nilaipbbdantons = Nilaipbbdanton::join('abaabas', 'nilaipbbdantons.abaaba_id', '=', 'abaabas.id')
            ->join('pesertas', 'nilaipbbdantons.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.user_id', '=', $id)
            ->select('nilaipbbdantons.*', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $nilaivarfors = Nilaivarfor::join('abaabas', 'nilaivarfors.abaaba_id', '=', 'abaabas.id')
            ->join('pesertas', 'nilaivarfors.peserta_id', '=', 'pesertas.id')
            ->join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.user_id', '=', $id)
            ->select('nilaivarfors.*', 'abaabas.nama_abaaba', 'abaabas.urutan_abaaba', 'abaabas.jenis_id')
            ->orderBy('abaabas.urutan_abaaba')
            ->get();
        $pengurangans = Minuspoin::join('pengurangans', 'minuspoins.pengurangan_id', '=', 'pengurangans.id')
            ->join('pesertas', 'minuspoins.peserta_id', '=', 'pesertas.id')
            ->join('users', 'minuspoins.user_id', '=', 'users.id')
            ->where('pesertas.id', '=', $peserta->id)
            ->select('minuspoins.minus', 'minuspoins.jumlah', 'pengurangans.*')
            ->orderby('pengurangans.id')
            ->get();

        return [
            'title'           => "Rekap Nilai Peserta",
            'abaabaPBBs'      => $abaabaPBBs,
            'abaabaDantons'   => $abaabaDantons,
            'abaabaVariasis'  => $abaabaVariasis,
            'abaabaFormasis'  => $abaabaFormasis,
            'juriPDs'         => $juriPDs,
            'juriVFs'         => $juriVFs,
            'jenisPBBs'       => $jenisPBBs,
            'jenisDantons'    => $jenisDantons,
            'jenisVariasis'   => $jenisVariasis,
            'jenisFormasis'   => $jenisFormasis,
            'nilaipbbdantons' => $nilaipbbdantons,
            'nilaivarfors'    => $nilaivarfors,
            'edPeserta'       => $edPeserta,
            'peserta'         => $peserta,
            'pengurangans'    => $pengurangans,
            'tingkatans'      => Tingkatan::all(),
        ];
    }

    public function rekapakhir()
    {
        return view('pages.admin.rekap.rekapakhir',[
            'title'      => 'Rekap Nilai Akhir',
            'tingkatans' => Tingkatan::all(),
        ]);
    }

    private function calculateRank($pesertas, $field, $rankField, $tieBreakers = [])
    {
        // Urutkan berdasarkan nilai field utama dan tie breakers
        $pesertas = $pesertas->sort(function ($a, $b) use ($field, $tieBreakers) {
            // Urutkan berdasarkan field utama (descending)
            if ($a->$field != $b->$field) {
                return $b->$field <=> $a->$field;
            }
            // Jika field utama sama, cek tie breakers
            foreach ($tieBreakers as $tieBreaker) {
                if ($a->$tieBreaker != $b->$tieBreaker) {
                    return $b->$tieBreaker <=> $a->$tieBreaker;
                }
            }
            
            return 0; // Jika semua nilai sama
        })->values();
        // Tetapkan ranking
        $rank = 1;
        foreach ($pesertas as $key => $peserta) {
            if (
                $key > 0 &&
                $pesertas[$key - 1]->$field == $peserta->$field &&
                // Cek tie breakers
                collect($tieBreakers)->every(function ($tieBreaker) use ($peserta, $pesertas, $key) {
                    return $pesertas[$key - 1]->$tieBreaker == $peserta->$tieBreaker;
                })
            ) {
                $peserta->$rankField = $pesertas[$key - 1]->$rankField;
            } else {
                $peserta->$rankField = $rank;
            }
            $rank++;
        }
        return $pesertas;
    }

    public function rekapnilaiakhir($id)
    {
        $featureStatus = Setting::get('rekap_nilai_akhir_peserta');
        if ($featureStatus === 'off' && auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Akses ditolak. Fitur ini sedang dinonaktifkan oleh admin.');
        }

        if ($featureStatus === 'on' && !in_array(auth()->user()->level, ['1ADMIN', '4PESERTA'])) {
            return redirect()->back()->with('error', 'Akses ditolak. Anda tidak memiliki izin.');
        }

        $tingkatan = Tingkatan::findOrFail($id);
        $pesertas = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.status', '=', 'AKTIF')
            ->select('pesertas.id as peserta_id', 'pesertas.no_urut', 'users.name')
            ->where('pesertas.tingkatan_id', '=', $id)
            ->orderby('pesertas.no_urut')
            ->get();

        foreach ($pesertas as $peserta) {
            $peserta->total_pbb = Nilaipbbdanton::join('abaabas', 'nilaipbbdantons.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '1PBB')
                ->where('nilaipbbdantons.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaipbbdantons.points');

            $peserta->total_danton = Nilaipbbdanton::join('abaabas', 'nilaipbbdantons.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '2DANTON')
                ->where('nilaipbbdantons.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaipbbdantons.points');

            $peserta->total_variasi = Nilaivarfor::join('abaabas', 'nilaivarfors.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '3VARIASI')
                ->where('nilaivarfors.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaivarfors.points');

            $peserta->total_formasi = Nilaivarfor::join('abaabas', 'nilaivarfors.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '4FORMASI')
                ->where('nilaivarfors.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaivarfors.points');

            $pengurangans = Minuspoin::join('pengurangans', 'minuspoins.pengurangan_id', '=', 'pengurangans.id')
                ->join('pesertas', 'minuspoins.peserta_id', '=', 'pesertas.id')
                ->join('users', 'minuspoins.user_id', '=', 'users.id')
                ->where('pesertas.id', '=', $peserta->peserta_id)
                ->select('minuspoins.minus', 'minuspoins.jumlah', 'pengurangans.*')
                ->orderby('pengurangans.id')
                ->get();

            $totalMinusPoin = 0;
            if ($pengurangans->count()) {
                foreach ($pengurangans as $pengurangan) {
                    $total = $pengurangan->poin * $pengurangan->jumlah;
                    $totalMinusPoin += $total;
                }
            }

            $peserta->minus_poin   = $totalMinusPoin;
            $peserta->total_utama  = $peserta->total_pbb + $peserta->total_danton - $peserta->minus_poin;
            $peserta->total_varfor = $peserta->total_variasi + $peserta->total_formasi;
            $peserta->total_umum   = $peserta->total_utama + $peserta->total_varfor;
        }

        $pesertas = $this->calculateRank($pesertas, 'total_pbb', 'rank_pbb', ['total_danton', 'total_varfor']);
        $pesertas = $this->calculateRank($pesertas, 'total_danton', 'rank_danton', ['total_pbb', 'total_varfor']);
        $pesertas = $this->calculateRank($pesertas, 'total_varfor', 'rank_varfor', ['total_pbb', 'total_danton']);
        $pesertas = $this->calculateRank($pesertas, 'total_utama', 'rank_utama', ['total_pbb', 'total_danton', 'total_varfor']);
        $pesertas = $this->calculateRank($pesertas, 'total_umum', 'rank_umum', ['total_pbb', 'total_danton', 'total_varfor']);

        $rekapNilais    = $pesertas->sortBy('rank_umum')->values();
        $rankingPBBs    = $pesertas->sortBy('rank_utama')->values();
        $rankingVarfors = $pesertas->sortBy('rank_varfor')->values();

        $benefitumums = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '1UMUM')
            ->orderby('prioritas')
            ->get();

        $benefitutamas = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '2UTAMA')
            ->orderby('prioritas')
            ->get();

        $benefitvarfors = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '3VARFOR')
            ->orderby('prioritas')
            ->get();

        $benefitpbbs = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '4PBB')
            ->orderby('prioritas')
            ->get();

        $benefitdantons = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '5DANTON')
            ->orderby('prioritas')
            ->get();

        $benefitpbbs = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '4PBB')
            ->orderby('prioritas')
            ->get();

        $benefitdantons = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '5DANTON')
            ->orderby('prioritas')
            ->get();

        return view('pages.admin.rekap.rekapnilaiakhir', [
            'title'          => "Rekap Nilai Akhir $tingkatan->nama_tingkatan",
            'id'             => $tingkatan->id,
            'rekapNilais'    => $rekapNilais,
            'rankingPBBs'    => $rankingPBBs,
            'rankingVarfors' => $rankingVarfors,
            'benefitumums'   => $benefitumums,
            'benefitutamas'  => $benefitutamas,
            'benefitvarfors' => $benefitvarfors,
            'benefitpbbs'    => $benefitpbbs,
            'benefitdantons' => $benefitdantons,
        ]);
    }

    public function rekapnilaiakhirpdf($id)
    {
        $featureStatus = Setting::get('rekap_nilai_akhir_peserta');
        if ($featureStatus === 'off' && auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Akses ditolak. Fitur ini sedang dinonaktifkan oleh admin.');
        }

        if ($featureStatus === 'on' && !in_array(auth()->user()->level, ['1ADMIN', '4PESERTA'])) {
            return redirect()->back()->with('error', 'Akses ditolak. Anda tidak memiliki izin.');
        }

        set_time_limit(300);
        // Mengambil data yang akan dimasukkan ke PDF
        $pdfData = $this->generateRekapNilaiAkhirPDF($id);
        // Load view ke dalam PDF dengan orientasi landscape
        $pdf = PDF::loadView('pages.admin.rekap.rekapnilaiakhirpdf', $pdfData)
            ->setPaper('a4', 'landscape');
        // Menampilkan PDF di browser
        return $pdf->stream("rekap_akhir_{$pdfData['title']}.pdf");
    }

    private function generateRekapNilaiAkhirPDF($id)
    {
        $featureStatus = Setting::get('rekap_nilai_akhir_peserta');
        if ($featureStatus === 'off' && auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Akses ditolak. Fitur ini sedang dinonaktifkan oleh admin.');
        }

        if ($featureStatus === 'on' && !in_array(auth()->user()->level, ['1ADMIN', '4PESERTA'])) {
            return redirect()->back()->with('error', 'Akses ditolak. Anda tidak memiliki izin.');
        }

        $tingkatan = Tingkatan::findOrFail($id);
        $tingkatan = Tingkatan::findOrFail($id);
        $pesertas = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
            ->where('pesertas.status', '=', 'AKTIF')
            ->select('pesertas.id as peserta_id', 'pesertas.no_urut', 'users.name')
            ->where('pesertas.tingkatan_id', '=', $id)
            ->orderby('pesertas.no_urut')
            ->get();
        
        foreach ($pesertas as $peserta) {
            $peserta->total_pbb = Nilaipbbdanton::join('abaabas', 'nilaipbbdantons.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '1PBB')
                ->where('nilaipbbdantons.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaipbbdantons.points');

            $peserta->total_danton = Nilaipbbdanton::join('abaabas', 'nilaipbbdantons.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '2DANTON')
                ->where('nilaipbbdantons.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaipbbdantons.points');

            $peserta->total_variasi = Nilaivarfor::join('abaabas', 'nilaivarfors.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '3VARIASI')
                ->where('nilaivarfors.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaivarfors.points');

            $peserta->total_formasi = Nilaivarfor::join('abaabas', 'nilaivarfors.abaaba_id', '=', 'abaabas.id')
                ->join('jenis', 'abaabas.jenis_id', '=', 'jenis.id')
                ->where('jenis.tipe', '=', '4FORMASI')
                ->where('nilaivarfors.peserta_id', '=', $peserta->peserta_id)
                ->sum('nilaivarfors.points');

            $pengurangans = Minuspoin::join('pengurangans', 'minuspoins.pengurangan_id', '=', 'pengurangans.id')
                ->join('pesertas', 'minuspoins.peserta_id', '=', 'pesertas.id')
                ->join('users', 'minuspoins.user_id', '=', 'users.id')
                ->where('pesertas.id', '=', $peserta->peserta_id)
                ->select('minuspoins.minus', 'minuspoins.jumlah', 'pengurangans.*')
                ->orderby('pengurangans.id')
                ->get();

            $totalMinusPoin = 0;
            if ($pengurangans->count()) {
                foreach ($pengurangans as $pengurangan) {
                    $total = $pengurangan->poin * $pengurangan->jumlah;
                    $totalMinusPoin += $total;
                }
            }

            $peserta->minus_poin   = $totalMinusPoin;
            $peserta->total_utama  = $peserta->total_pbb + $peserta->total_danton - $peserta->minus_poin;
            $peserta->total_varfor = $peserta->total_variasi + $peserta->total_formasi;
            $peserta->total_umum   = $peserta->total_utama + $peserta->total_varfor;
        }

        $pesertas = $this->calculateRank($pesertas, 'total_pbb', 'rank_pbb', ['total_danton', 'total_varfor']);
        $pesertas = $this->calculateRank($pesertas, 'total_danton', 'rank_danton', ['total_pbb', 'total_varfor']);
        $pesertas = $this->calculateRank($pesertas, 'total_varfor', 'rank_varfor', ['total_pbb', 'total_danton']);
        $pesertas = $this->calculateRank($pesertas, 'total_utama', 'rank_utama', ['total_pbb', 'total_danton', 'total_varfor']);
        $pesertas = $this->calculateRank($pesertas, 'total_umum', 'rank_umum', ['total_pbb', 'total_danton', 'total_varfor']);

        $rekapNilais    = $pesertas->sortBy('rank_umum')->values();
        $rankingPBBs    = $pesertas->sortBy('rank_utama')->values();
        $rankingVarfors = $pesertas->sortBy('rank_varfor')->values();

        $benefitumums = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '1UMUM')
            ->orderby('prioritas')
            ->get();

        $benefitutamas = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '2UTAMA')
            ->orderby('prioritas')
            ->get();

        $benefitvarfors = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '3VARFOR')
            ->orderby('prioritas')
            ->get();

        $benefitpbbs = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '4PBB')
            ->orderby('prioritas')
            ->get();

        $benefitdantons = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '5DANTON')
            ->orderby('prioritas')
            ->get();

        $benefitpbbs = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '4PBB')
            ->orderby('prioritas')
            ->get();

        $benefitdantons = Benefit::where('tingkatan_id', '=', $tingkatan->id)
            ->where('tipe', '=', '5DANTON')
            ->orderby('prioritas')
            ->get();

        return [
            'title'          => "Rekap Nilai Akhir $tingkatan->nama_tingkatan",
            'pesertas'       => $pesertas,
            'rekapNilais'    => $rekapNilais,
            'rankingPBBs'    => $rankingPBBs,
            'rankingVarfors' => $rankingVarfors,
            'benefitumums'   => $benefitumums,
            'benefitutamas'  => $benefitutamas,
            'benefitvarfors' => $benefitvarfors,
            'benefitpbbs'    => $benefitpbbs,
            'benefitdantons' => $benefitdantons,
            'tingkatans'     => Tingkatan::all(),
        ];
    }
}