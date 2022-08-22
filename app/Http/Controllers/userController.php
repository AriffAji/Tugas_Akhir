<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index(){
        $user = DB::table('vuser')->get();
        return view('/superadmin/user/index', ['user'=>$user]);
        
    }
    public function add(){
       $user = DB::table('users')->get();
       $role = DB::table('roles')->get();
        return view('/superadmin/user/add', ['user'=>$user], ['role'=>$role]);
        
    }
    public function store(Request $request){
        DB::table('users')->insert([
    
        'username' =>$request->iusername,
        'nim' =>$request->inim,
        'email' =>$request->iemail,
        'password' =>$request->ipassword,
        'role_id' =>$request->irole_id,
           
        ]);
        return redirect()->route('user')->with('message','Data Berhasil Disimpan');
    }
    public function edit($id){
            $id =DB::table('users')->where("id","$id")->first();
            $role = DB::table('roles')->get();
            return view('/superadmin/user/update', ['id'=>$id], ['role'=>$role]);
            
    }
    
    public function update(Request $request,$id){
                DB::table('users')->where("id","$id")->update([
                'username' =>$request->iusername,
                'nim' =>$request->inim,
                'email' =>$request->iemail,
                'password'=>bcrypt($request->ipassword),
                'role_id' =>$request->irole_id,
           
                ]);
                return redirect()->route('roles')->with('message','Data Berhasil diupdate');
    //  = bcrypt($validatedData['password'])
    }   
    

    public function delete($id){
                echo "hapus ID";
                echo $id;
                DB::table('users')->where("id","$id")->delete();     
        return redirect()->back()->with('message','Data Berhasil dihapus');
    }
}