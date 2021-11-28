<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Petugas;
use App\Pelapor;
use App\Rambu;
use App\Laporan;
use Image;
use DB;
use Session;
use Excel;
use App\Exports\ExportLap;
use App\Exports\ExportLap2;
use PDF;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function data_laporan(Request $request)
    {


        $method = $request->method();

        if ($request->isMethod('POST'))
        {
            $from = $request->input('from');
            $to   = $request->input('to');
            $nama = $request->input('nama_pelapor');
            if ($request->has('search'))
            {
                // select search
                // $search = DB::table("SELECT * FROM pengunjung INNER JOIN asal ON asal.id=pengunjung.asal_id INNER JOIN
                // pegawai ON pegawai.id=pengunjung.pegawai_id WHERE pengunjung.created_at BETWEEN '$from' AND '$to'");
                $search = Laporan::with('pelapor')->where('created_at','>=',$from)->where('created_at','<=',$to)->where('status','=','belum diperbaiki')->select()->get();



                return view('admin/data_laporan',['laporan' => $search]);
            }


                elseif($request->has('exportExcel')){

                // select Excel
                $nama_file = 'laporan_kerusakan_'.date($from).'_sampai_'.date($to).'.xlsx';

                if($from==null AND $to==null){
                 Session::flash('failed','Tanggal belum diisi!');
                  return redirect()->back();
                }else{

                return Excel::download(new ExportLap($from, $to), $nama_file);
                }

                }

                elseif($request->has('exportPDF')){

                // select Excel
                $nama_file = 'laporan_kerusakan_'.date($from).'_sampai_'.date($to).'.xlsx';

                if($from==null AND $to==null){
                 Session::flash('failed','Tanggal belum diisi!');
                  return redirect()->back();
                }else{

                $laporan=Laporan::with('pelapor')->where('created_at','>=',$from)->where('created_at','<=',$to)->where('status','=','belum diperbaiki')->select()->get();

                $pdf = PDF::loadview('admin/laporanpdf',['laporan'=>$laporan]);
                return $pdf->download('laporan-pdf');
                }

                }

                elseif($request->has('cari')){

                    $cari=Laporan::where('nama_pelapor','LIKE','%'.$nama.'%')->get();

                   return view('admin/data_laporan',['laporan' => $cari]);

                }

        }
            else
        {
            //select all
             $laporan=Laporan::where('status','=','belum diperbaiki')->get();
        return view('admin/data_laporan',['laporan'=>$laporan]);
        }

        // $laporan=Laporan::all();
        // return view('admin/data_laporan',['laporan'=>$laporan]);
    }



    public function data_pelapor()
    {
        $pelapor = Pelapor::all(['id_pelapor','nama_pelapor','nomor_hp','email']);
        return view('admin/data_pelapor', ['pelapor'=>$pelapor]);
    }
    public function destroy($id_pelapor) {
           $pelapor = Pelapor::find($id_pelapor);
            $pelapor->delete();
        notify()->warning('Place has been deleted');
        return redirect()->back();
    
    }
    public function data_petugas()
    {
        $petugas = Petugas::all(['id_petugas','nama_petugas','email','jabatan']);
        return view('admin/data_petugas',['petugas' => $petugas]);
    }

    public function simpanpetugas(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'email'=>'required|email',
            'jabatan' => 'required',
        ]);
        $petugas= new Petugas;
        $petugas->nama_petugas=$request->nama_petugas;
        $petugas->email=$request->email;
        $petugas->jabatan=$request->jabatan;
        $petugas->save();

        /// redirect jika sukses menyimpan data
        return redirect('data_petugas')->
                        with('success','Post created successfully.');
    }

 
    public function editpetugas(Request $request)
    {
        $data = Petugas::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    public function updatepetugas(Request $request)
    {
        $data = array(
        'nama_petugas'=>$request->post('nama_petugas'),
        'email'=>$request->post('email'),
        'jabatan'=>$request->post('jabatan')
    );
        $simpan = DB::table('petugas')->where('id_petugas','=',$request->post('id'))->update($data);
        if($simpan){
        Session::flash('status','Data berhasil diupdate.');
        }else{
        Session::flash('status','Data gagal diupdate.');
    }
        return redirect('data_petugas');
    }


    public function hapetugas(Request $request)
    {
        $data = Petugas::findOrFail($request->get('id'));
        echo json_encode($data);

        
    }

 public function hapuspetugas(Request $request)
    {
       $id = $request->post('idh');
    
        $petugas=Petugas::find($id);
        $petugas->delete();
    //     $simpan = DB::table('petugas')->where('id_petugas','=',$data)->delete();
    //     if($simpan){
    //     Session::flash('status','Data berhasil diupdate.');
    //     }else{
    //     Session::flash('status','Data gagal diupdate.');
    // }
    Session::flash('status','Data berhasil Dihapus.');
        return redirect('data_petugas');
    }

    // public function hapuspetugas(Request $request,$id_petugas)
    // {
    // $petugas = Petugas::find($id_petugas);

    //     $petugas->nama_petugas=$request->nama_petugas;
    //     $petugas->email=$request->email;
    //     $petugas->jabatan=$request->jabatan;
    //     $petugas->delete();

    // return redirect('data_petugas')->
    // with('success','Post created successfully.');
    // }


    public function data_perbaikan(Request $request){
         $method = $request->method();

        if ($request->isMethod('POST'))
        {
            $from = $request->input('from');
            $to   = $request->input('to');
            $nama = $request->input('nama_pelapor');
            if ($request->has('search'))
            {
                // select search
                // $search = DB::table("SELECT * FROM pengunjung INNER JOIN asal ON asal.id=pengunjung.asal_id INNER JOIN
                // pegawai ON pegawai.id=pengunjung.pegawai_id WHERE pengunjung.created_at BETWEEN '$from' AND '$to'");
                $search = Laporan::with('pelapor')->where('created_at','>=',$from)->where('created_at','<=',$to)->where('status','=','diperbaiki')->select()->get();



                return view('admin/data_perbaikan',['laporan' => $search]);
            }


                elseif($request->has('exportExcel')){
                $nama_file = 'laporan_perbaikan_'.date($from).'_sampai_'.date($to).'.xlsx';
               if($from==null AND $to==null){
                 Session::flash('failed','Tanggal belum diisi!');
                  return redirect()->back();
                }else{

                return Excel::download(new ExportLap2($from, $to), $nama_file);
                }
                }
                 elseif($request->has('exportPDF')){


                if($from==null AND $to==null){
                 Session::flash('failed','Tanggal belum diisi!');
                  return redirect()->back();
                }else{

                $laporan=Laporan::with('pelapor')->where('created_at','>=',$from)->where('created_at','<=',$to)->where('status','=','diperbaiki')->select()->get();

                $pdf = PDF::loadview('admin/laporanperbaikanpdf',['laporan'=>$laporan]);
                return $pdf->download('laporan-perbaikan-pdf');
                }

                }

                elseif($request->has('cari')){

                    $cari=Laporan::where('nama_pelapor','LIKE','%'.$nama.'%')->get();


                    return view('admin/data_laporan',['laporan' => $cari]);

                }

        }
            else
        {
            //select all
             $laporan=Laporan::where('status','=','diperbaiki')->get();
        return view('admin/data_perbaikan',['laporan'=>$laporan]);
        }
    }

     public function simpanrambu(Request $request)
    {
        $request->validate([
            'nama_rambu' => 'required',
            'jenis_rambu'=>'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
            $gambar = $request->file('gambar');
            $input['namagambar'] = time().'.'.$gambar->extension();
            // $nama_file = time()."_".$gambar->getClientOriginalName();
            // $tujuan_upload = 'gambar_rambu';
            $destinationPath = public_path('thumbnail');
            $gbr = Image::make($gambar->path());
            $gbr->resize(40, 40, function ($constraint) {
            $constraint->aspectRatio();
             })->save($destinationPath.'/'.$input['namagambar']);
   
            $destinationPath = public_path('gambar_rambu');
            $gambar->move($destinationPath, $input['namagambar']);


        Rambu::create([
            
            'nama_rambu' => $request->nama_rambu,
            'jenis_rambu' =>$request->jenis_rambu,
            'gambar' => $input['namagambar'],
            
        ]);
       

      

        /// redirect jika sukses menyimpan data
        return redirect('data_perbaikan')->
                        with('success','Data berhasil ditambahkan')->with('namagambar',$input['namagambar']);
    }


    public function edit_status(Request $request)
    {
        $laporan = Laporan::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    public function ubah_status(Request $request,$id_laporan)
    {
        $laporan=Laporan::findOrFail($id_laporan);
         $laporan=DB::table('laporan')->where('id_laporan','=',$id_laporan, 'AND','status','belum diperbaiki')->update(['status' => 'diperbaiki']);
      
  
      // $laporan->save();
 // if($request->hasFile('gambar')){
        
 //            $gambar = $request->file('gambar');
 //            $input['namagambar'] = time().'.'.$gambar->extension();
 //            // $nama_file = time()."_".$gambar->getClientOriginalName();
 //            // $tujuan_upload = 'gambar_rambu';
 //            $destinationPath = public_path('thumbnail');
 //            $gbr = Image::make($gambar->path());
 //            $gbr->resize(40, 40, function ($constraint) {
 //            $constraint->aspectRatio();
 //             })->save($destinationPath.'/'.$input['namagambar']);
   
 //            $destinationPath = public_path('gambar_rambu');
 //            $gambar->move($destinationPath, $input['namagambar']);


    //     $data = array(
    //     'status'=>$request->post('status'),
        
    // );
        
    //     // $simpan = DB::table('rambu')->where('id_rambu','=',$request->post('id'))->update($data);
    //     // if($simpan){
    //     // Session::flash('status','Data berhasil diupdate.');
    //     // }else{
    //     // Session::flash('status','Data gagal diupdate.');
    //     // }

    //     //    return redirect('data_perbaikan')->with('namagambar',$input['namagambar']);
    //     //  }else{
    //     //     $data = array(
    //     // 'nama_rambu'=>$request->post('nama_rambu'),
    //     // 'jenis_rambu'=>$request->post('jenis_rambu'));

    //  $simpan = DB::table('laporan')->where('id_laporan','=',$request->post('id'))->update($data);
    //     if($simpan){
    //     Session::flash('status','Data berhasil diupdate.');
    //     }else{
    //     Session::flash('status','Data gagal diupdate.');
    //     }
        // }
   notify()->success('Status Laporan Diperbaiki');
        return redirect('data_perbaikan');
    }

   

    public function hapusrambu(Request $request,$id_rambu)
    {
    $rambu = Rambu::find($id_rambu);

        $rambu->nama_rambu=$request->nama_rambu;
        $rambu->jenis_rambu=$request->jenis_rambu;
        $rambu->gambar=$request->gambar;
        $rambu->delete();

    return redirect('data_perbaikan')->
    with('success','Data berhasil dihapus.');
    }


    public function recycle()
    {
        $laporan = Laporan::onlyTrashed()->get();
        return view('admin/recycle', ['laporan'=>$laporan]);
    }

    public function restore($id_laporan)
    {
        $laporan = Laporan::onlyTrashed()->where('id_laporan',$id_laporan);
        $laporan->restore();
        notify()->success('Data berhasil di restore.');
        return view('admin/recycle',['laporan'=>$laporan]);
    }

    public function permanent_delete($id_laporan){
        $laporan = Laporan::onlyTrashed()->where('id_laporan',$id_laporan);
        $laporan->Pelapor()->forceDelete();
        $laporan->forceDelete();
        notify()->success('Data berhasil dihapus permanen!');
        return view('admin/recycle',['laporan'=>$laporan]);
    }
}
