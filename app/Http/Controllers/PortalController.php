<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Berkas;
use App\Models\Cp;
use App\Models\Detail;
use App\Models\Sosmed;
use App\Models\Timeline;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.portal', [
            'benefits'   => Benefit::orderby('tipe')->orderby('prioritas')->get(),
            'berkas'     => Berkas::first(),
            'cps'        => Cp::all(),
            'details'    => Detail::first(),
            'sosmeds'    => Sosmed::first(),
            'timelines'  => Timeline::first(),
            'tingkatans' => Tingkatan::all(),
        ]);
    }
}