<?php

namespace App\Http\Controllers;

use App\User;
use App\Petugas;
use App\Pelapor;
use App\Laporan;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $pelapor=Pelapor::count();
        $laporan=Laporan::count();
        $fix=Laporan::where('status','diperbaiki')->count();
        $unfix=Laporan::where('status','belum diperbaiki')->count();

        $widget = [
            'laporan'=>$laporan,
            'pelapor'=>$pelapor,
            'fix'=>$fix,
            'unfix'=>$unfix,
            //...
        ];

        $chart = Laporan::select(DB::raw("COUNT(id_laporan) as count"),DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("MONTH(created_at)"))
                    ->get();

        $data=[];
        foreach($chart as $row){
            $data['label'][]=$row['month_name'];
            $data['data'][]=(int)$row['count'];
        }


        return view('admin/home', compact('widget','laporan','data'));
    }

  
}
