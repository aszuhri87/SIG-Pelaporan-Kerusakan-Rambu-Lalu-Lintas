<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Pelapor;
use App\Laporan;

class WelcomeController extends Controller
{
    public function index()
{
       $laporan=Laporan::where('status','=','diperbaiki')->get();
       return view('welcome',['laporan'=>$laporan]);
}

public function captcha(){

    return view('pelapor/autentikasi');
}

public function capthcaFormValidate(Request $request)
    {
        $request->validate([
          
            'captcha' => 'required|captcha'
        ]);
        
        return redirect('form_pelapor')->
                        with('success','Post created successfully.');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function about()
    {
        return view('/about');
    }
}
