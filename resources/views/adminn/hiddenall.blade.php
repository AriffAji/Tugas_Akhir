@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Data Semua')

@section('konten')

<div class="row">
   
</div>

<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-header">
             <h4><a href="/exportsemua" class="btn btn-icon icon-left btn-primary"> Export PDF</a></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table_list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kompetisi</th>
                            <th>Nama Ketua</th>
                            <th>Nama Kelompok</th>
                            <th>Dosen Pembimbing</th>
                            <th>Anggota 1</th>
                            <th>Anggota 2</th>
                            <th>Anggota 3</th>
                            <th>Tingkatan</th>
                            <th>Pendanaan</th>
                            <th>Proposal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $number = 1;?>
                            @foreach($review as $nm)
                            <tr>
                                <td>{{$number}}</td>
                                <td class="text-center">{{$nm->nama_kompetisi}}</td>
                                <td class="text-center">{{$nm->nama_ketua}}</td>
                                <td class="text-center">{{$nm->dosen_pembimbing}}</td>
                                <td class="text-center">{{$nm->nama_kelompok}}</td>
                                <td class="text-center">{{$nm->anggota1}}</td>
                                <td class="text-center">{{$nm->anggota2}}</td>
                                <td class="text-center">{{$nm->anggota3}}</td>
                                <td class="text-center">{{$nm->tingkatan}}</td>
                                <td class="text-center">{{$nm->pendanaan}}</td>
                                <td class="text-center">{{$nm->proposal}}</td>
                                <td class="text-center ">{{$nm->status}}</td>
                                {{-- <td class="text-center text-nonwrap">
                                    <a href="{{route('mahasiswa.edit', $nm->ID)}}"   class="btn btn-primary btn-action mr-1 "><i class="fas fa-upload"><br> Upload Sertifikat</i></a>                       
                                </td>                     --}}
                            </tr>
                            <?php $number++;?>  
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            Footer
            </div>
        </div>
    </div>
</div>



@endsection

@push('JSLib')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
{{-- <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script> --}}
@endpush

@push('JSFile')
{{-- <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>     --}}
@endpush

@push('page-styles')
{{-- <script rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.css') }}"></script> --}}
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}"></script>

@endpush

@push('page-script')


@endpush

