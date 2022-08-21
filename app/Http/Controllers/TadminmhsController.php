<?php

namespace App\Http\Controllers;
use App\Models\vmhs;
use App\Models\vsudahselesai;
use App\Models\vsedangkompetisi;
use Illuminate\Http\Request;

class TadminmhsController extends Controller
{
      public function index(){
        return view('adminn.sedangMengikuti');
    }
    public function mahasiswa(){
         $columns = [
            'ID',
            'nama_kompetisi',
            'nama_ketua',
            'dosen_pembimbing',
            'nama_kelompok',
            'status',

        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vsedangkompetisi::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_kompetisi) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_ketua) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(dosen_pembimbing) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_kelompok) like ?', '%'.strtolower(request('search.value')).'%')
                    ;
            });
        }

        $recordFiltered = $data->get()->count();
        $data = $data->orderBy($orderBy, request()->input('order.0.dir'));

        if(request()->input('length')!=-1)
        $data = $data->skip(request()->input('start'))->take(request()->input('length'))->get();

        $recordTotal = $data->count();

        return response()->json([
            'draw'=>request()->input('draw'),
            'recordsTotal'=>$recordTotal,
            'recordsFiltered'=>$recordFiltered,
            'data'=>$data
        ]);

    }

    // // // //
    public function sudah(){
        return view('adminn.selesaiLomba');
    }
    public function sudahselesai(){
         $columns = [
            'ID',
            'nama_kompetisi',
            'nama_ketua',
            'dosen_pembimbing',
            'nama_kelompok',
            'proposal',
            'sertifikat',
            'status',

        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vsudahselesai::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                     ->orWhereRaw('LOWER(nama_kompetisi) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_ketua) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(dosen_pembimbing) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_kelompok) like ?', '%'.strtolower(request('search.value')).'%')
                    ;
            });
        }

        $recordFiltered = $data->get()->count();
        $data = $data->orderBy($orderBy, request()->input('order.0.dir'));

        if(request()->input('length')!=-1)
        $data = $data->skip(request()->input('start'))->take(request()->input('length'))->get();

        $recordTotal = $data->count();

        return response()->json([
            'draw'=>request()->input('draw'),
            'recordsTotal'=>$recordTotal,
            'recordsFiltered'=>$recordFiltered,
            'data'=>$data
        ]);

    }
    // // // //

}