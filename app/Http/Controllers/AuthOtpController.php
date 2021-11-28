<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo;

class AuthOtpController extends Controller
{
    public function show(){
        return view('/pelapor/verifikasi');
    }

    public function verify(Request $request){
        $this->validate($request,[
            'code'=>'size:4'
        ]);

        try {

        $request_id=session('nexmo_request_id');
        $verification=new \Nexmo\Verify\Verification($request_id);

        Nexmo::verify()->check($verification,$request->code);

         $date=date_create();

         notify()->success('Laporan Berhasil Dikirim');
         return redirect('form_pelapor');
        
    
}
    catch (Nexmo\Client\Exception\Request $e) {
        return redirect()->back()->withErrors([
            'code' => $e->getMessage()
        ]);
        notify()->warning('Code salah atau menggunakan nomor yang sama lebih dari 3 kali, cobalah menunggu beberapa menit!');
        return redirect('/form_pelapor');

    }
    }

}
