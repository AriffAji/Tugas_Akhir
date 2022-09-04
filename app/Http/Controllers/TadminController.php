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
    // Dashboard Admin
    public function index()
    {
        $juara = tkompetisi::where('prestasi', 'Juara')->count();
        $tidakjuara = tkompetisi::where('prestasi', 'Peserta')->count();
        $sedangmengikuti = vsedangkompetisi::where('status', 'Sedang Mengikuti Lomba')->count();
        $sudahselesai = vsudahselesai::where('status', 'Sudah Selesai')->count();

        return view('adminn.Dadmin', compact('juara', 'tidakjuara', 'sedangmengikuti', 'sudahselesai'));
    }
    // Dashboard Admin

    // Data untuk mahasiswa sedang mengikuti Kompetisi
    public function sedangkompetisi()
    {
        $sedangkompetisi = DB::table('vsedangkompetisi')->get();
        return view('adminn.sedangMengikuti', ['sedangkompetisi' => $sedangkompetisi]);
    }
    // Data untuk mahasiswa sedang mengikuti Kompetisi

    // Data selesai Lomba
    public function selesailomba()
    {
        $selesailomba = DB::table('vsudahselesai')->get();
        return view('adminn.selesaiLomba', ['selesailomba' => $selesailomba]);
    }
    // Data selesai Lomba

    // Data untuk mengeikuti semua Kompetisi
    public function index4()
    {
        $all = DB::table('vall')->get();
        return view('adminn.datasemua', ['semua' => $all]);
    }
    // Data untuk mengeikuti semua Kompetisi

    // export PDF
    public function vall(Request $request)
    {
        $review = DB::table('vall')->get();
        return view('adminn.hiddenall', ['review' => $review]);
    }

    public function exportsemua()
    {
        $data = vall::all();
        view()->share('review', $data);

        $pdf = PDF::loadview('adminn.exportsemua');
        return $pdf->download('datakompetisi.pdf');
    }
    // export PDF
}