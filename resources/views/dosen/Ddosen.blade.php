@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Dashboard Dosen')

@section('konten')

<div>
    <center>
        <h2>Selamat Datang,  {{ auth()->user()->username }}</h2>
        <h3>Ada yang Menanti Persetujuan Bapak!</h3>
    </center>
      <div class="row">
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                    </div>
     <div class="form-group">
                    <div class="row ">
                      <div class="col-6">
                         <a href="{{route('dosen.detail')}}" class="btn btn-success btn-action col-12 ">Menyetujui</i></a>    
                      </div>
                      <div class="col-6">
                       <a href="{{route('dosen.detail2')}}" class="btn btn-danger btn-action col-12 ">Pembatalan</i></a>  
                      </div>
                    </div>
    </div>
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

