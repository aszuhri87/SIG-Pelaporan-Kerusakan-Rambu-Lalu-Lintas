<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pelapor;
use App\Laporan;

class PelaporController extends Controller
{
    public function index()
    {
    	// $pelapor = Pelapor::all(['id_pelapor','nama_pelapor','nomor_hp','email']);
        // return view('pelapor/form_pelapor', ['pelapor'=>$pelapor]);
         return view('pelapor/form_pelapor');
    }

    public function show($id_laporan)
    {
    	$laporan=Laporan::find($id_laporan);
        return view('pelapor/detail_lap', compact('laporan'));
    }


}
