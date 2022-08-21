@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Data Selesai Mengikuti Lomba')

@section('konten')

<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-header">
                <h4><a href="" class="btn btn-icon icon-left btn-primary"> Export PDF</a></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table_list">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Kompetisi</th>
                            <th>Nama Ketua</th>
                            <th>Dosen Pembimbing</th>
                            <th>Nama Kelompok</th>
                            <th>Proposal</th>
                            <th>Sertifikat</th>
                            <th>Status</th>
    
                        </tr>
                    </thead>
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
<script type="application/javascript">
let data=[]

const table= $("#table_list").DataTable({
    "responsive":true,
    "autowidth":true,
    "pageLength":5,
    "lengthMenu":[[3,5,10,15,20,1000],[3,5,10,15,20,"ALL"]],
    "order":[[0,"asc"]],
    "bServerSide":true,
    "bLengthChange":true,
    "bFilter":true,
    "bInfo":true,
    "processing":true,

    "ajax":{
        url:"{{url('data_selesai')}}",
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
                return row.ID
            //    return `<span onclick="ambilsatudata(${row.ID})" >${row.ID}</span>`
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.nama_kompetisi
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.nama_ketua
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.dosen_pembimbing
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.nama_kelompok
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.proposal
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.sertifikat
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.status
            }
        },
    ]
})

</script>

@endpush

