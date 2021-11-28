<?php


  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Petugas;
use DB;
use Hash;
use Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
            $user = User::with('petugas');
            return view('admin/register', compact('user','petugas'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     public function petugas_akun(Request $request)
    {
        $data = Petugas::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    public function tambah_akun(Request $request)
    {
        $petugas= new Petugas;
        $petugas->id=$request->id_petugas;
        $petugas->nama_petugas=$request->nama_petugas;
        $petugas->email=$request->email;
  
   
      User::create([
           
            'name' => $request->name,
            'id_petugas'=>$request->id_petugas,
            'email' =>$petugas->email,
            'password'=>$request['password'],
        ]);
       
        return redirect('data_petugas');
    }
}


