<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TdosenController extends Controller
{
      public function index(){
        return view('dosen.Ddosen');
    }

    public function detail(){
        $review2 = DB::table('vsetujuidosen')->get();
        return view('dosen.persetujuan', ['review2'=>$review2]);
        
    }
    
    public function detail2(){
        $review2 = DB::table('vpembatalandosen')->get();
        $validation['user_id']= auth()->user()->id;
        return view('dosen.pembatalan', ['review2'=>$review2]);
    }
    
    public function setujui(){
      return view('dosen.edit', compact('kompetisi'));
    }

    public function edit($ID){
        $ID = DB::table('tkompetisi')->where("ID","$ID")->first();
        return view('dosen.edit', ['ID'=>$ID]);
    }

    public function updatedosen(Request $request, $ID){
        var_dump($request->all());
        DB::table('tkompetisi')->where("ID",$ID)->update([
            'isDosenAcc'=>$request->isDosenAcc,
        ]);
        DB::table('users')->where("ID",$ID)->update([
            'isDosenVerif'=>$request->isDosenVerif,
        ]);
        return redirect()->route('dosen.dashboard')->with('message','Data Berhasil diupdate');
    }

   public function hapusdata($ID){
    echo "hapus ID";
    echo $ID;
    DB::table('tkompetisi')->where("ID","$ID")->delete();
    return redirect()->back()->with('message','Data Berhasil dihapus');
  }

}