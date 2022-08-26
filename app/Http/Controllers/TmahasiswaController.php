<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TmahasiswaController extends Controller
{
    //dasboard
    public function beranda()
    {
        return view('mahasiswa.Dmahasiswa');
    }

    // form masukkan data
    public function index(){
        $dosen = DB::table('users')->where('role_id', 3)->get();
        $mhs = DB::table('users')->where('role_id', 1)->get();
        $kompetisi = DB::table('tkompetisi')->get();
        return view('mahasiswa.Fmahasiswa', compact('mhs', 'dosen'));
        
    }

    // menambah data
    // public function tambahdata(Request $request){
        
    //     tkompetisi::create(request()->all());
    //     return response()->json(true);
    // }

    public function tambahdata(Request $request){
        $proposal = $request->file('proposal')->getClientOriginalName();
        $request->file('proposal')->storeAs('proposal/', $proposal);
        $this->_validation($request);
        DB::table('tkompetisi')->insert([
            'nama_kompetisi'=>$request->nama_kompetisi,
            'nama_ketua'=>$request->nama_ketua,
            'dosen_pembimbing'=>$request->dosen_pembimbing,
            'nama_kelompok'=>$request->nama_kelompok,
            'tingkatan'=>$request->tingkatan,
            'waktu_pelaksanaan'=>$request->waktu_pelaksanaan,
            'anggota1'=>$request->anggota1,
            'anggota2'=>$request->anggota2,
            'anggota3'=>$request->anggota3,
            'pendanaan'=>$request->pendanaan,
            'user_id'=>$request->user_id,
            'proposal'=>$request->proposal->getClientOriginalName(),
        
        ]);
        // $validateData = Auth()->user()->id;
        return redirect()->route('mahasiswa.detail')->with('success','Pendaftaran Kompetisi Sukses');
    }

    // form masukkan data
    public function detaildata(Request $request){
        $review = DB::table('vreview')->where('user_id', Auth::user()->id)->get();

        return view('mahasiswa.detailmhs', compact('review'));
    }
    
    public function edit(Request $request ,$ID){
        $ID = DB::table('tkompetisi')->where("ID","$ID")->first();
        return view('mahasiswa.upload', ['ID'=>$ID]);
    }
    public function update(Request $request, $ID){
        $sertifikat = $request->file('isertifikat')->getClientOriginalName();
        $request->file('isertifikat')->storeAs('sertifikat/', $sertifikat);
        $this->_validasi($request);
        DB::table('tkompetisi')->where("ID",$ID)->update([
            
            'nama_kompetisi'=>$request->nama_kompetisi,
            'nama_ketua'=>$request->nama_ketua,
            'dosen_pembimbing'=>$request->dosen_pembimbing,
            'nama_kelompok'=>$request->nama_kelompok,
            'tingkatan'=>$request->tingkatan,
            'pendanaan'=>$request->pendanaan,
            'proposal'=>$request->proposal,
            'waktu_pelaksanaan'=>$request->waktu_pelaksanaan,
            'status'=>$request->status,
            'prestasi'=>$request->prestasi,
            'penyerapan_dana'=>$request->penyerapan_dana,
            'user_id'=>$request->user_id,
            'sertifikat'=>$request->sertifikat->getClientOriginalName(),

        ]);
        return redirect()->route('mahasiswa.detail')->with('message','Data Berhasil diupdate');
    }

    public function uploadsertifikat(){
        $kompetisi2 = DB::table('tkompetisi2')->get();
        $kompetisi = DB::table('tkompetisi')->get();
        return view('mahasiswa.upload', compact('kompetisi2','kompetisi'));
    }
    

    // menampilkan data review

    public function riwayat(){
        $riwayat = DB::table('vriwayat')->where('user_id', Auth::user()->id)->get();
        $anggota1 = DB::table('vanggota1')->where('user_id', Auth::user()->id)->first();
        $anggota2 = DB::table('vanggota2')->where('user_id', Auth::user()->id)->first();
        $anggota3 = DB::table('vanggota3')->where('user_id', Auth::user()->id)->first();
        // return view('mahasiswa.riwayat', compact('riwayat'));
        return view('mahasiswa.riwayat', compact('riwayat','anggota1','anggota2','anggota3'));
    }
    
    public function _validation(Request $request){
        $validation=$request->validate([
            'nama_kompetisi'=>'required|',
            'nama_ketua'=>'required|',
            'dosen_pembimbing'=>'required|',
            'nama_kelompok'=>'required|unique:tkompetisi',
            'tingkatan'=>'required|',
            'waktu_pelaksanaan'=>'required|',
            'anggota1'=>'required|',
            'anggota2'=>'required|',
            'anggota3'=>'required|',
            'pendanaan'=>'required|',
            'proposal'=>'required|mimes:pdf|max:1024',
        ]);
    }
    public function _validasi(Request $request){
        $validation=$request->validate([
            'sertifikat'=>'required|mimes:pdf|max:1024',
        ]);
    }
}