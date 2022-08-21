@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Form Mengikuti Lomba')

@section('konten')

<div style="margin-bottom: 25px">
    
  <div class="row">
      <div class="col-5 ">
          <label for="">Tahun :</label>
          <select name="" id=""  class="form-control selectric">
              <option value="">2022</option>
              <option value="">2021</option>
          </select>
      </div>
      <div class="col-5">
          <label for="">Jenis Kompetisi :</label>
          <select name="" id=""  class="form-control selectric ">
              <option value="">PKM</option>
              <option value="">PKM-V</option>
          </select>
      </div>
      <div class="col-2" style="margin-top: 30px">
          <button class="btn btn-primary" type="submit"> Search</button>
      </div>
  </div>

    
</div>
<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-header">
            Riwayat
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table_list">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>ProgramStudi</th>
                            <th>Status</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer">
                
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

