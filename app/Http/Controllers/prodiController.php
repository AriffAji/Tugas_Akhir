<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prodiController extends Controller
{
      public function index(){
        $prodi = DB::table('tprodi')->get();
        return view('/superadmin/prodi/index', ['prodi'=>$prodi]);
        
    }
    public function add(){
       $prodi = DB::table('tprodi')->get();
        return view('/superadmin/prodi/add', ['prodi'=>$prodi]);
        
    }
    public function store(Request $request){
        DB::table('tprodi')->insert([
    
        'program_studi' =>$request->iprogram_studi,
        
           
        ]);
        return redirect()->route('tprodi')->with('message','Data Berhasil Disimpan');
    }
    public function edit($ID){
            $ID =DB::table('tprodi')->where("ID","$ID")->first();
            return view('/superadmin/prodi/update', ['ID'=>$ID]);
            
    }
    
    public function update(Request $request,$ID){
                DB::table('tprodi')->where("ID","$ID")->update([
                'program_studi' =>$request->iprogram_studi,
           
                ]);
                return redirect()->route('tprodi')->with('message','Data Berhasil diupdate');
    }   
    

    public function delete($ID){
                echo "hapus ID";
                echo $ID;
                DB::table('tprodi')->where("ID","$ID")->delete();     
        return redirect()->back()->with('message','Data Berhasil dihapus');
    }
}