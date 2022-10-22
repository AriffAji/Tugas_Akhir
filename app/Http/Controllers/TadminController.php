<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tkompetisi;
use App\Models\Tkompetisi2;
use App\Models\tmahasiswa;
use App\Models\User;
use App\Models\vall;
use App\Models\vexport;
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
        $dibatalkan = Tkompetisi2::where('status', '1')->count();
        $semua = vall::count();




        return view('adminn.Dadmin', compact('juara', 'tidakjuara', 'sedangmengikuti', 'sudahselesai', 'dibatalkan', 'semua'));
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

    // Data selesai Lomba
    public function dibatalkan()
    {
        $dibatalkan = DB::table('vdibatalkan')->get();
        return view('adminn.dibatalkan', ['dibatalkan' => $dibatalkan]);
    }
    // Data selesai Lomba

    // Data untuk mengeikuti semua Kompetisi
    public function all()
    {
        $all = DB::table('vall')->get();
        return view('adminn.datasemua', ['semua' => $all]);
    }
    // Data untuk mengeikuti semua Kompetisi

    // export PDF
    public function vall(Request $request)
    {
        $review = DB::table('vexport')->get();
        return view('adminn.export.hiddenall', ['review' => $review]);
    }

    public function exportsemua()
    {
        $data = vexport::all();
        view()->share('review', $data);

        $pdf = PDF::loadview('adminn.export.exportsemua');
        return $pdf->download('datakompetisi.pdf');
    }
    // export PDF

    // download
    // public function download($proposal)
    // {
    //     $data = DB::table('tkompetisi')->where('proposal', $proposal)->first();
    //     $filepath = storage_path("proposal/{$data->path}");
    //     return \Response::download($filepath);
    // }
}