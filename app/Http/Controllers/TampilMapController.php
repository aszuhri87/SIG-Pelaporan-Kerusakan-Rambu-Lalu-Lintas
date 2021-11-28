<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Rambu;

class TampilMapController extends Controller
{
    public function index(){

    	$laporan = Laporan::all();
    	
    	return view ('pelapor.form_pelapor', compact('laporan'));
    }
}
