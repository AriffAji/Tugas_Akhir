@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Pembatalan Dosen')

@section('konten')

<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-header">
            Header
            </div>
            <div class="card-body">
                <table class="table table-bordered "  id="table_list">
                    <thead>
                        <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">Nama Kompetisi</th>
                                <th class="text-center">Nama Ketua</th>
                                <th class="text-center">Dosen Pembimbing</th>
                                <th class="text-center">Nama Kelompok</th>
                                <th class="text-center">Proposal</th>
                                <th class="text-center">Pendanaan</th>
                                <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $number = 1;?>
                            @foreach($review2 as $nm)
                            <tr>
                                <td>{{$number}}</td>
                                {{-- <td class="text-center"><a href="{{route('mahasiswa.edit', $nm->ID)}}">{{$nm->ID}}</a></td> --}}
                                <td class="text-center">{{$nm->nama_kompetisi}}</td>
                                <td class="text-center">{{$nm->nama_ketua}}</td>
                                <td class="text-center">{{$nm->dosen_pembimbing}}</td>
                                <td class="text-center">{{$nm->nama_kelompok}}</td>
                                <td class="text-center">{{$nm->proposal}}</td>
                                <td class="text-center">{{"Rp. " . number_format($nm->pendanaan, 0, '.',',')}}</td>
                                <td class="text-center text-nonwrap">
                                    <a href="{{route('dosen.hapus', $nm->ID)}}"  class="btn btn-danger btn-action mr-1" method="POST" onclick="return confirm('Yakin?');"> 
                                        @csrf
                                        @method('delete')
                                        <i class="fas fa-ban"><br>Batalkan</i>
                                    </a> 
                                    
                                    {{-- data-confirm="Realy?|Do you want to continue?" data-confirm-yes="alert('Deleted :)');" --}}
                                </td>                    
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

