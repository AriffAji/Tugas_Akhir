@extends('layouts.indexmaster')
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Data Semua')

@section('konten')

    <div class="row">

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><a href="/exportsemua" class="btn btn-icon icon-left btn-primary"> Export PDF</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table_list">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama Kompetisi</th>
                                <th class="text-center">Nama Ketua</th>
                                <th class="text-center">Nama Kelompok</th>
                                <th class="text-center">Dosen Pembimbing</th>
                                <th class="text-center">Tingkatan</th>
                                <th class="text-center">Pendanaan</th>
                                <th class="text-center">Proposal</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $number = 1; ?>
                            @foreach ($semua as $nm)
                                <tr>
                                    <td>{{ $number }}</td>
                                    <td class="text-center">{{ $nm->nama_kompetisi }}</td>
                                    <td class="text-center">{{ $nm->nama_ketua }}</td>
                                    <td class="text-center">{{ $nm->nama_kelompok }}</td>
                                    <td class="text-center">{{ $nm->dosen_pembimbing }}</td>
                                    <td class="text-center">{{ $nm->tingkatan }}</td>
                                    <td class="text-center">{{ $nm->pendanaan }}</td>
                                    <td class="text-center"><a href="{{ asset('/storage/proposal/' . $nm->proposal) }}"
                                            target="_blank">{{ $nm->proposal }} </td>
                                    <td class="text-center">{{ $nm->status }}</td>
                                </tr>
                                <?php $number++; ?>
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
    {{-- <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script> --}}
@endpush

@push('page-styles')
    {{-- <script rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.css') }}"></script> --}}
    <script rel="stylesheet"
        src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
    <script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}">
    </script>
@endpush

@push('page-script')
    <script type="application/javascript">
let data=[]

const table= $("#table_list").DataTable({
    "responsive":true,
    "autowidth":false,
    "pageLength":5,
    "lengthMenu":[[3,5,10,15,20,1000],[3,5,10,15,20,"ALL"]],
    "order":[[0,"asc"]],
    "bServerSide":true,
    "bLengthChange":true,
    "bFilter":true,
    "bInfo":true,
    "processing":true,

    "ajax":{
        url:"{{ url('data_semua') }}",
        type:"post",
        data:function(d){
            d._token = "{{ csrf_token() }}"
            d.areaaa = $("#area_filter").val()
        }
    },
    columns:[
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
               return row.ID
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
                return row.nama_kelompok
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
                return row.tingkatan
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.pendanaan
            }
        },
        // {
        //     "class":"",
        //     "sortable":true,
        //     "render":function(data,type,row,meta){
        //         return row.proposal
        //     }
        // },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.status
            }
        },
    ]
})


$('#formA').on('submit', function (event){
    event.preventDefault()  //untuk melakukan keep data agar tidak menjadi json masuk ke
    submitform() //mengirimkan data ke database
    
})

function submitform(){
    let form = $('#formA');
    const url = "{{ url('addmahasiswa') }}"; //menggunakan url yang dibuat, data dapat dilihat pada network.

    $.ajax({
        url,
        method: "POST",
        data:form.serialize(),

        success:function(response){
            console.log(response)
            clearform() //untuk hapus isi data
            refreshTable() //untuk merefresh halaman
        },
        error:function(ee){
            console.log(ee)
            alert("Kesalahan Input") //warning jika ada kesalahan
        }
    })
}


function clearform(){
    $("#formA [name='nim']").val('')
    $("#formA [name='nama']").val('')
    $("#formA [name='prodi']").val('')
    $("#tombolHapus").removeClass("visible")
    $("#tombolHapus").addClass("invisible")
    $("#activeClass").removeClass("inactive")
    $("#activeClass").addClass("active")

}

function refreshTable(){
    table.ajax.reload(function(){
    },true);
}

function hapusData(){
    const id = $("#formA [name='id']").val()
    const c = confirm("Yakin Mengahpus Data?")
    if(c===true){
        $.ajax({
            url:`{{ url('deletemahasiswa') }}?id=${id}`,
            success:function(res){
                console.log('Data yang dihapus',id) 
                clearform()
                refreshTable()
                alert('Hapus')
               
            },
            error:(err)=>{
                alert("Terjadi Kesalahan")
            }
            
        })
       
    }
    console.log('Ini Hapus Data');
}

const ambilsatudata = (id)=>(
    $.ajax({
        url:`{{ url('detailmahasiswa') }}?id=${id}`,
        success:function(ress){
            $("#formA [name='id']").val(id)
            $("#formA [name='nim']").val(ress.nim)
            $("#formA [name='nama']").val(ress.nama)
            $("#formA [name='prodi']").val(ress.prodi)  
            // $("#form-name").text("update data")
            $("#tombolHapus").removeClass("invisible")
            $("#tombolHapus").addClass("visible")
            $("#activeClass").removeClass("inactive")
            $("#activeClass").addClass("active")
            jQuery("#activeClass").css('background-color','#00ffd9')
            // jQuery("#form-warna").css('background-color','#00ffd9')

    console.log('data yang diambil ID =', id)
    // , 'dan', ress.nama, ress.prodi 
        }
    })
)
</script>
@endpush
