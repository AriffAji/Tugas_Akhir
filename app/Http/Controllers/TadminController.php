<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tkompetisi;
use App\Models\tmahasiswa;
use App\Models\User;
use App\Models\vall;
use App\Models\vsedangkompetisi;
use App\Models\vsudahselesai;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class TadminController extends Controller
{
    public function index(){
        $juara = tkompetisi::where('prestasi', 'Juara')->count();
        $tidakjuara = tkompetisi::where('prestasi', 'Peserta')->count();
        $sedangmengikuti = vsedangkompetisi::where('status','Sedang Mengikuti Lomba')->count();
        $sudahselesai = vsudahselesai::where('status','Sudah Selesai')->count();
        
        return view('adminn.Dadmin', compact('juara', 'tidakjuara', 'sedangmengikuti', 'sudahselesai'));
    }
    public function vall(Request $request){
        $review = DB::table('vall')->get();
        
        return view('adminn.hiddenall', ['review'=>$review]);
    }
    public function exportsemua(){
            
        
            $data = vall::all();
            view()->share('review',$data);
            
            $pdf = PDF::loadview('adminn.exportsemua');
            return $pdf->download('datakompetisi.pdf');
   

    
    }
}