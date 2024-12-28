<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BayarStoreRequest;
use App\Http\Requests\Admin\BayarUpdateRequest;
use App\Models\Bayar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BayarController extends Controller
{
    protected $limit = 10;
    protected $fields = array('bayars.*');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = auth()->user()->id;
        $userLevel = auth()->user()->level;
        
        $search = $request->query('search');
        if ($userLevel === '1ADMIN') {
            $title = 'Data Pembayaran Pleton';
            $bayars = User::join('bayars', 'users.id', '=', 'bayars.user_id')
                ->where(function ($query) {
                    $query->where('users.level', '=', '4PESERTA')
                        ->orWhere('users.level', '=', '5CALONPESERTA');
                })
                ->select('users.name', 'bayars.user_id as user_id')
                ->distinct();

            // Filter search
            if ($search) {
                $bayars->where('users.name', 'like', "%$search%");
            }
        } elseif ($userLevel === '4PESERTA' || $userLevel === '5CALONPESERTA') {
            $title = 'Data Pembayaran';
            $bayars = Bayar::join('users', 'bayars.user_id', '=', 'users.id')
                ->where('bayars.user_id', '=', $userId)
                ->select('bayars.*', 'users.name')
                ->orderBy('bayars.created_at', 'desc');

            // Filter search
            if ($search) {
                $bayars->where('users.name', 'like', "%$search%");
            }
        }
        
        $page           = $request->query('page', 1);
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $bayars         = $bayars->paginate($perPage, ['*'], 'page', $page);

        return view('pages.admin.bayar.data', [
            'title'          => $title,
            'bayars'         => $bayars,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
            'search'         => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayarans = User::where('level', '=', 'PESERTA')
            ->orWhere('level', '=', 'CALONPESERTA')
            ->orderBy('name')
            ->get();
        
        return view('pages.admin.bayar.create', [
            'title'       => 'Tambah Bukti Pembayaran',
            'pembayarans' => $pembayarans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BayarStoreRequest $request)
    {
        $bayars          = new Bayar();
        $bayars->user_id = $request->user_id;
        if ($request->hasFile('screenshoot')) {
            $file                = $request->file('screenshoot');
            $filePath            = $file->store('bayar', 'public');
            $bayars->screenshoot = $filePath;
        }
        $bayars->save();

        return redirect('/dashboard/administrasi/bayar')->with('success', 'Pembayaran Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {
        $userBayar = User::FindOrFail($id);
        $bayars = Bayar::join('users', 'bayars.user_id', '=', 'users.id')
            ->where('bayars.user_id', '=', $id)
            ->orderBy('bayars.created_at', 'desc')
            ->select('bayars.*', 'users.name as user_name');
        
        $page           = $request->query('page', 1);
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $bayars         = $bayars->paginate($perPage, ['*'], 'page', $page);

        return view('pages.admin.bayar.show', [
            'title'          => "Data Pleton: $userBayar->name",
            'bayars'         => $bayars,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
            'id'             => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edBayar       = Bayar::FindOrFail($id);
        $formattedDate = Carbon::parse($edBayar->created_at)->translatedFormat('l, d F Y');
        $formattedTime = Carbon::parse($edBayar->created_at)->format('H:i');

        return view('pages.admin.bayar.edit', [
            'title'      => "Edit Pembayaran Tanggal $formattedDate Pukul $formattedTime",
            'edBayar'    => $edBayar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BayarUpdateRequest $request, $id)
    {
        $edBayar = Bayar::FindOrFail($id);
        if ($request->hasFile('screenshoot')) {
            if ($edBayar->screenshoot && \Storage::disk('public')->exists($edBayar->screenshoot)) {
                \Storage::disk('public')->delete($edBayar->screenshoot);
            }
            $file                 = $request->file('screenshoot');
            $filePath             = $file->store('bayar', 'public');
            $edBayar->screenshoot = $filePath;
        }
        $edBayar->save();

        return redirect('/dashboard/administrasi/bayar')->with('success', 'Pembayaran yang Dipilih Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edBayar = Bayar::findOrFail($id);
        if ($edBayar->screenshoot) {
            \Storage::disk('public')->delete($edBayar->screenshoot);
        }
        $edBayar->delete();
        
        return redirect('/dashboard/administrasi/bayar')->with('success', 'Pembayaran yang Dipilih Telah Dihapus!');
    }
}