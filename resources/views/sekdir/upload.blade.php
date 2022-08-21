@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Form Mengikuti Lomba')

@section('konten')

<div>
    
            <div class="col">
                <form class="card" id="formA">
                    <div class="card-header" id="form-warna" >
                    Header
                    </div>
                    <div class="row">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <div class="row" >
                                
                                {{-- <input type="hidden" name="id" class="form-control"> --}}
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Upload Proposal </label>
                                    <input type="file"  name="prestasi" class="form-control" placeholder="Masukkan Dana yang telah terserap anda...">
                                </div>
                              
                                
                            </div>
                        </div>

                    </div>
                    <div class="card-footer" style="text-align: right; margin-right:2%">
                        <button type="button" class="btn btn-danger invisible" onclick="hapusData()" id="tombolHapus">Hapus</button>
                        <button type="button" class="btn btn-secondary " onclick="clearform()" id="tombolClear">Clear</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                
                    </div>
                </form>
        
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

