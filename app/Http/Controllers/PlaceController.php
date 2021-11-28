<?php

namespace App\Http\Controllers;
use App\Laporan;
use App\Pelapor;
use App\Rambu;
use Nexmo;
use Illuminate\Http\Request;
use Image;

class PlaceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Laporan $laporan) {
		return view('laporan.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('pelapor.form_pelapor');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
	
		$width = 100;
		$height = 100;
		$gambar = $request->file('gambar');
		
		$input['namagambarRsk'] = time() . '.' . $gambar->extension();
		$nama_file = time()."_".$gambar->getClientOriginalName();
		$tujuan_upload = 'gambar_rambu';
		$destinationPath = public_path('thumbnail');
		$gbr = Image::make($gambar->path());
		$gbr->height() > $gbr->width() ? $width = null : $height = null;
		$gbr->resize($width, $height, function ($constraint) {
			$constraint->aspectRatio();
		})->save($destinationPath . '/' . $input['namagambarRsk']);

		$destinationPath = public_path('gambar_kerusakan');
		$gambar->move($destinationPath, $input['namagambarRsk']);

		$pelapor = new Pelapor;

		$pelapor->nama_pelapor = $request->nama_pelapor;
		$pelapor->nomor_hp = $request->nomor_hp;
		$pelapor->email = $request->email;
		$pelapor->id_pelapor = $request->id_pelapor;
		$pelapor->save();

		$laporan = new Laporan;
		$laporan->id_pelapor = $request->id_pelapor;
		$laporan->status='belum diperbaiki';
		$laporan->latitude = $request->latitude;
		$laporan->longitude = $request->longitude;
		$laporan->detail_lokasi = $request->detail_lokasi;
		$laporan->gambar = $input['namagambarRsk'];

		// $verification = Nexmo::verify()->start(
		//     ['number'=>$pelapor->nomor_hp,
		//     'brand'=>'Verfikasi',
		//     ]
		// );
		// session(['nexmo_request_id'=>$verification->getRequestID()]);

		$pelapor->Laporan()->save($laporan);

	
		// return redirect('verifikasi')->with('namagambarRsk', $input['namagambarRsk']);
		return redirect('form_pelapor')->with('namagambarRsk', $input['namagambarRsk']);
		notify()->success('Laporan Berhasil Dikirim');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Laporan $laporan)
    {
     
        return view('admin/detail_lap', compact('laporan'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id_laporan) {
		   $laporan = Laporan::find($id_laporan);
		  
	        $laporan->delete();
        notify()->warning('Place has been deleted');
        return redirect()->back();
    
	}
}
