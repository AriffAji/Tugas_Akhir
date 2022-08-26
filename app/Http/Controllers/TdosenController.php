<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TdosenController extends Controller
{
      public function index(){
        return view('dosen.Ddosen');
    }

    public function detail(){
        $review2 = DB::table('vsetujuidosen')->where('dosen_pembimbing', Auth::user()->username)->get();
        return view('dosen.persetujuan', ['review2'=>$review2]);
        
    }
    
    public function detail2(){
        $review2 = DB::table('vpembatalandosen')->where('dosen_pembimbing', Auth::user()->username)->get();
        return view('dosen.pembatalan', ['review2'=>$review2]);
    }
    
    public function setujui(){
      return view('dosen.edit', compact('kompetisi'));
    }

    public function edit($ID){
        $ID = DB::table('veditdosen')->where("ID","$ID")->first();
        $anggota1 = DB::table('vanggota1')->first();
        $anggota2 = DB::table('vanggota2')->first();
        $anggota3 = DB::table('vanggota3')->first();
        return view('dosen.edit',compact('ID','anggota1','anggota2','anggota3'))->with('message','Data Berhasil diupdate');
    }

    public function updatedosen(Request $request, $ID){
        DB::table('tkompetisi')->where("ID",$ID)->update([
            'isDosenAcc'=>$request->isDosenAcc,
        ]);
        return redirect()->route('dosen.detail')->with('message','Data Berhasil diupdate');
    }

   public function hapusdata($ID){
    echo "hapus ID";
    echo $ID;
    DB::table('tkompetisi')->where("ID","$ID")->delete();
    return redirect()->back()->with('success','Data Berhasil dihapus');
  }

}