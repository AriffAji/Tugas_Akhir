@extends('layouts.indexmaster')
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Dashboard Sekertaris Direktur')

@section('konten')

    <div class="col">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" style="border-radius:10px" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form class="card" id="formA">
            <div class="card-header justify-content-center">
                <center>
                    <h2>Selamat Datang, {{ auth()->user()->username }}</h2>
                    <h3>Ada yang Menanti Persetujuan Bapak/Ibu!</h3>
                </center>
            </div>
            <div class="row justify-content-center">
                <div>
                    <div class="login-brand">
                        <h4>Aplikasi Monitoring Kegiatan Kompetisi Mahasiswa</h4>
                        <br>
                        <br>
                        <img src="/assets/img/logo.png" alt="" style="height:200px" alt="logo">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <a href="{{ route('sekdir.persetujuan') }}"
                        class="btn btn-success btn-action col-12 ">Menyetujui</i></a>
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
    <script rel="stylesheet"
        src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
    <script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}">
    </script>
@endpush

@push('page-script')
@endpush
