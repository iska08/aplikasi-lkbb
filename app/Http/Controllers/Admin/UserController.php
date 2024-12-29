<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $limit = 10;
    protected $fields = array('users.*');
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
        $search = $request->query('search');
        $level  = $request->query('level');

        // Query pengguna, kecuali admin yang sedang login
        $users = User::where('id', '!=', auth()->user()->id)
            ->orderBy('level')
            ->orderBy('id');

        // Filter berdasarkan pencarian (search)
        if ($search) {
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // Filter berdasarkan level
        if ($level) {
            $users->where('level', $level);
        }

        // Pagination dan konfigurasi tampilan per halaman
        $perPageOptions = [5, 10, 15, 20, 25];
        $perPage        = $request->query('perPage', $perPageOptions[1]);
        $users          = $users->paginate($perPage);

        // Opsi level untuk dropdown filter
        $levelOptions = [
            '2JURIPBB'      => 'JURI PBB',
            '3JURIVARFOR'   => 'JURI VARFOR',
            '4PESERTA'      => 'PESERTA',
            '5CALONPESERTA' => 'CALON PESERTA',
        ];

        return view('pages.admin.user.data', [
            'title'          => 'Data Pengguna',
            'users'          => $users,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage,
            'search'         => $search,
            'level'          => $level,
            'levelOptions'   => $levelOptions,
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

        return view('pages.admin.user.create', [
            'title'      => 'Tambah Pengguna',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validate = $request->validated();
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);

        return redirect('/dashboard/pengguna/user')->with('success', 'Pengguna Baru Telah Ditambahkan!');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        return view('pages.admin.user.edit', [
            'title'      => 'Edit Pengguna',
            'user'       => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UserUpdateRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if (auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validate = $request->validated();
        if ($validate['password'] ?? false) {
            $validate['password'] = Hash::make($validate['password']);
        }
        User::where('id', $user->id)->update($validate);

        return redirect('/dashboard/pengguna/user')->with('success', 'Pengguna yang Dipilih Telah Diperbarui!');
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

        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard/pengguna/user')->with('success', 'Pengguna yang Dipilih Telah Dihapus!');
    }
}