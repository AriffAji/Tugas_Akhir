<?php

namespace App\Http\Controllers;
use App\Models\vall;
use Illuminate\Http\Request;

class TadmindosenController extends Controller
{
    // untuk data semua yang mengikuti kompetisi
     public function index(){   
        return view('adminn.datasemua');
    }

    public function dosen(){
         $columns = [
            'ID',
            'nama_kompetisi',
            'nama_ketua',
            'dosen_pembimbing',
            'tingkatan',
            'pendanaan',
            'proposal',
            'nama_kelompok',
            'status',
            
        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vall::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                     ->orWhereRaw('LOWER(nama_kompetisi) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_ketua) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(dosen_pembimbing) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_kelompok) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(anggota1) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(anggota2) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(anggota3) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(tingkatan) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(pendanaan) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(status) like ?', '%'.strtolower(request('search.value')).'%')
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
}