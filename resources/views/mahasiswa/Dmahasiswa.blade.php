@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Dashboard Mahasiswa')

@section('konten')

    <div class="col">
                <form class="card" id="formA">
                    <div class="card-header"  >
                    Header
                    </div>
                    <div class="row justify-content-center">
                       <div>
                        <div class="login-brand">
                          <h4>Aplikasi Monitoring Kegiatan Kompetisi Mahasiswa</h4>
                          <br>
                          <br>
                          <img src="/assets/img/logo.png" alt="" style="height:200px" alt="logo" >
                        </div>
                      </div>
                    </div>
                    <div class="card-footer" style="text-align: right; margin-right:2%">
                    <div class="row ">
                      <div class="col-6">
                         <a href="{{route('mahasiswa.form')}}" class="btn btn-primary btn-action col-12 ">Mengikuti Lomba</i></a>    
                      </div>
                      <div class="col-6">
                       <a href="{{route('mahasiswa.detail')}}" class="btn btn-info btn-action col-12 ">Upload Proposal</i></a>  
                      </div>
                    </div>
                    </div>
                </form>
        
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

