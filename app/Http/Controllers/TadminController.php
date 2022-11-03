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
        $semua = (vall::count()) + (Tkompetisi2::count());


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
        $all = DB::table('vall')->select()->get();
        $prodi = DB::table('tprodi')->get();
        return view('adminn.datasemua', ['all' => $all]);
        // return view('adminn.datasemua', compact('all', 'prodi'));
    }
    // Data untuk mengeikuti semua Kompetisi

    //periode
    public function periode(Request $request)
    {
        $fromDate = $request->input("fromDate");
        $toDate = $request->input("toDate");

        try {
            $all = DB::table('vall')->select()
                ->where('waktu_pelaksanaan', '>=', $fromDate)
                ->where('waktu_pelaksanaan', '<=', $toDate)
                ->get();
            // dd($all);
        } catch (\Exception $e) {

            return redirect()->back();
        }
        return view('adminn.datasemua', compact('all'));
    }

    // periode

    // Data untuk belum Acc Dosen
    public function accdosen()
    {
        $acc = DB::table('vaccdosen')->get();
        return view('adminn.datadosen', ['acc' => $acc]);
    }
    // Data untuk belum Acc Dosen

    // Data untuk belum Acc Sekdir
    public function accsekdir()
    {
        $accsekdir = DB::table('vaccsekdir')->get();
        return view('adminn.datasekdir', ['accsekdir' => $accsekdir]);
    }
    // Data untuk belum Acc Dosen


    // export PDF
    public function vall(Request $request)
    {
        $review = DB::table('vexport')->get();
        return view('adminn.export.hiddenall', ['review' => $review]);
    }

    public function exportsemua()
    {
        $data = vall::all();
        view()->share('review', $data);

        $pdf = PDF::loadview('adminn.export.exportsemua');
        return $pdf->download('datakompetisi.pdf');
    }
    // export PDF


}