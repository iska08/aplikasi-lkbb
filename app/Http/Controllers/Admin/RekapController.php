<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abaaba;
use App\Models\Benefit;
use App\Models\Jenis;
use App\Models\Nilaipbbdanton;
use App\Models\Nilaivarfor;
use App\Models\Peserta;
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

    private function calculateRank($pesertas, $field, $rankField)
    {
        $pesertas = $pesertas->sortByDesc($field)->values();
        $rank = 1;
        foreach ($pesertas as $key => $peserta) {
            if (
                $key > 0 &&
                $pesertas[$key - 1]->$field == $peserta->$field
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
        $tingkatan = Tingkatan::findOrFail($id);
        $pesertas = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
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

            $peserta->total_utama  = $peserta->total_pbb + $peserta->total_danton;
            $peserta->total_varfor = $peserta->total_variasi + $peserta->total_formasi;
            $peserta->total_umum   = $peserta->total_utama + $peserta->total_varfor;
        }

        $pesertas = $this->calculateRank($pesertas, 'total_pbb', 'rank_pbb');
        $pesertas = $this->calculateRank($pesertas, 'total_danton', 'rank_danton');
        $pesertas = $this->calculateRank($pesertas, 'total_varfor', 'rank_varfor');
        $pesertas = $this->calculateRank($pesertas, 'total_utama', 'rank_utama');
        $pesertas = $this->calculateRank($pesertas, 'total_umum', 'rank_umum');
        
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

        return view('pages.admin.rekap.rekapnilaiakhir', [
            'title'          => "Rekap Nilai Akhir $tingkatan->nama_tingkatan",
            'id'             => $tingkatan->id,
            'pesertas'       => $pesertas,
            'benefitumums'   => $benefitumums,
            'benefitutamas'  => $benefitutamas,
            'benefitvarfors' => $benefitvarfors,
            'benefitpbbs'    => $benefitpbbs,
            'benefitdantons' => $benefitdantons,
        ]);
    }

    public function rekapnilaiakhirpdf($id)
    {
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
        $tingkatan = Tingkatan::findOrFail($id);
        $pesertas = Peserta::join('users', 'pesertas.user_id', '=', 'users.id')
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

            $peserta->total_utama  = $peserta->total_pbb + $peserta->total_danton;
            $peserta->total_varfor = $peserta->total_variasi + $peserta->total_formasi;
            $peserta->total_umum   = $peserta->total_utama + $peserta->total_varfor;
        }

        $pesertas = $this->calculateRank($pesertas, 'total_pbb', 'rank_pbb');
        $pesertas = $this->calculateRank($pesertas, 'total_danton', 'rank_danton');
        $pesertas = $this->calculateRank($pesertas, 'total_varfor', 'rank_varfor');
        $pesertas = $this->calculateRank($pesertas, 'total_utama', 'rank_utama');
        $pesertas = $this->calculateRank($pesertas, 'total_umum', 'rank_umum');
        
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

        return [
            'title'          => "Rekap Nilai Akhir $tingkatan->nama_tingkatan",
            'pesertas'       => $pesertas,
            'benefitumums'   => $benefitumums,
            'benefitutamas'  => $benefitutamas,
            'benefitvarfors' => $benefitvarfors,
            'benefitpbbs'    => $benefitpbbs,
            'benefitdantons' => $benefitdantons,
            'tingkatans'     => Tingkatan::all(),
        ];
    }
}