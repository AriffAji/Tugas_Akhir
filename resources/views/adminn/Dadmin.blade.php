@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Data Mahasiswa')

@section('konten')

<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-award"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Mahasiswa Juara</h4>
                  </div>
                  <div class="card-body">
                    {{ $juara }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Mahasiswa Tidak Juara</h4>
                  </div>
                  <div class="card-body">
                     {{ $tidakjuara }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sedang Mengikuti</h4>
                  </div>
                  <div class="card-body">
                     {{ $sedangmengikuti }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sudah Selesai</h4>
                  </div>
                  <div class="card-body">
                    {{ $sudahselesai }}
                  </div>
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

<script type="application/javascript">
let data=[]

const table= $("#table_list").DataTable({

    "ajax":{
        url:"{{url('data_dosen')}}",
        type:"post",
        data:function(d){
            d._token = "{{ csrf_token()}}"
            d.areaaa = $("#area_filter").val()
        }
    },
    columns:[
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
               return juara
            }
        },
      
    ]
})
</script>
@endpush

