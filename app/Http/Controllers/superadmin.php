<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class superadmin extends Controller
{
    public function index(){
        $roles = DB::table('roles')->get();
        return view('/superadmin/role/index', ['roles'=>$roles]);
        
    }
    public function add(){
        $roles = DB::table('roles')->get();
        return view('/superadmin/role/add', ['roles'=>$roles]);
        
    }
    public function store(Request $request){
        DB::table('roles')->insert([
    
        'sebagai' =>$request->isebagai,
           
        ]);
        return redirect()->route('role')->with('message','Data Berhasil Disimpan');
    }
    public function edit($id){
            $id =DB::table('roles')->where("id","$id")->first();
            return view('/superadmin/role/update', ['id'=>$id]);
            
    }
    
    public function update(Request $request,$id){
                DB::table('roles')->where("id","$id")->update([
                'sebagai'=>$request->isebagai,
                ]);
                return redirect()->route('roles')->with('message','Data Berhasil diupdate');
    
    }
    

    public function delete($id){
                echo "hapus ID";
                echo $id;
                DB::table('roles')->where("id","$id")->delete();     
        return redirect()->back()->with('message','Data Berhasil dihapus');
    }
}