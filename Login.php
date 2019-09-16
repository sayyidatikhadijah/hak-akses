<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\ModelUser;
use Validator;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function cek(Request $req)
    {
        $this->validate($req,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $proses=ModelUser::where('email',$req->email)->where('password',$req->password)->first();
        if($proses){
            Session::put('id',$proses->id);
            Session::put('email',$proses->email);
            Session::put('password',$proses->password);
            Session::put('nama',$proses->nama);
            Session::put('hak_akses',$proses->hak_akses);
            Session::put('login_status',true);
            return redirect('/');
        } else {
            Session::flash('alert_pesan','Username dan password tidak cocok');
            return redirect('login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}
