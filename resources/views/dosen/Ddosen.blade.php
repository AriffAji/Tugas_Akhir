@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Dashboard Dosen')

@section('konten')
  <div class="col">
                <form class="card" id="formA">
                    <div class="card-header justify-content-center"  >
                    <center>
                        <h2>Selamat Datang,  {{ auth()->user()->username }}</h2>
                        <h3>Ada yang Menanti Persetujuan Bapak!</h3>
                    </center>
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
                   <div class="row ">
                      <div class="col-6">
                         <a href="{{route('dosen.detail')}}" class="btn btn-success btn-action col-12 ">Menyetujui</i></a>    
                      </div>
                      <div class="col-6">
                       <a href="{{route('dosen.detail2')}}" class="btn btn-danger btn-action col-12 ">Pembatalan</i></a>  
                      </div>
                    </div>
                   </div>
                </form>
        
            </div>
   




@endsection

@push('JSLib')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@push('JSFile')
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>    
@endpush

@push('page-styles')
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}"></script>

@endpush

