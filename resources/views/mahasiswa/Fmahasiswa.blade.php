@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Form Mengikuti Lomba')

@section('konten')

<div>
            <div class="col">
                <form class="card" id="formA" action="{{ route ('mahasiswa.addform') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-header" id="form-warna" >
                    Header
                    </div>
                    <div class="row">
                        <div class="card-body col-6">
                            <div class="row" >
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="nama_kompetisi">Nama Kompetisi</label>
                                    <input type="text" maxlength="100" name="nama_kompetisi" class="form-control @error('nama_kompetisi') is-invalid @enderror" placeholder="Masukkan Nama Kompetisi..." 
                                    required value="{{ old('nama_kompetisi') }}">
                                    @error('nama_kompetisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Nama Ketua</label>
                                     <input type="text" maxlength="100" name="nama_ketua" readonly class="form-control" value="{{ auth()->user()->username }}">
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Dosen Pembimbing</label>
                                    <select class="form-control selectric" name="dosen_pembimbing" >
                                        <option> </option>
                                        @foreach ($dosen as $dosbim)
                                        <option value="{{$dosbim->id}}">{{$dosbim->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Nama Kelompok</label>
                                    <input type="text" maxlength="12" name="nama_kelompok" class="form-control @error('nama_kelompok') is-invalid @enderror" placeholder="Masukkan Nama kelompok . . . ." required value="{{ old('nama_kelompok') }}">
                                    @error('nama_kelompok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <sub>Note : Kelompok Harus Unik</sub>
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Tingkat Lomba</label>
                                        <select class="form-control selectric" name="tingkatan" >
                                            <option> </option>
                                            <option>Kabupaten</option>
                                            <option>Provinsi</option>
                                            <option>Nasional</option>
                                            <option>Internasional</option>
                                        </select>
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Waktu Pelaksanaan</label>
                                    <input type="date"  name="waktu_pelaksanaan" class="form-control" value="{{ old('waktu_pelaksanaan') }}">
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body col-6">
                            <div class="row" >
                                
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Nama Anggota 1</label>
                                    <select class="form-control selectric" name="anggota1" >
                                        <option> </option>
                                        @foreach ($mhs as $item1)
                                        <option value="{{$item1->id}}">{{$item1->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Nama Anggota 2</label>
                                    <select class="form-control selectric" name="anggota2" >
                                        <option> </option>
                                        @foreach ($mhs as $item1)
                                        <option value="{{$item1->id}}">{{$item1->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Nama Anggota 3</label>
                                    <select class="form-control selectric" name="anggota3" >
                                        <option> </option>
                                        @foreach ($mhs as $item1)
                                        <option value="{{$item1->id}}">{{$item1->username}}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px">
                                    <label for="">Pendanaan</label>
                                        <select class="form-control selectric" name="pendanaan" >
                                            <option> </option>
                                            <option>Mandiri</option>
                                            <option>Kampus</option>
                                            <option>Lain-lain</option>
                                        </select>
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px" >
                                    <label for="" class="form-label">Upload Proposal</label>
                                    <input type="file"  name="proposal" class="form-control @error('proposal') is-invalid @enderror" >
                                     @error('proposal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <sub>Note : Penamaan File(NamaKompetisi_NamaKelompok_NamaKetuaKelompok.pdf)</sub>
                                </div>
                                <div class="col-12 " style="margin-bottom: 12px" >
                                    <input type="hidden"  name="user_id" value="{{ auth()->user()->id}}" >
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    <div class="card-footer" style="text-align: right; margin-right:2%">
                        <button type="button" class="btn btn-danger invisible" onclick="hapusData()" id="tombolHapus">Hapus</button>
                        <button type="button" class="btn btn-secondary " onclick="clearform()" id="tombolClear">Clear</button>
                        <button type="submit" class="btn btn-primary"> Save</button>
                
                    </div>
                </form>
                  <h4><a href="{{route('mahasiswa.detail')}}" class="btn btn-primary btn-lg btn-block" tabindex="4">Upload Sertifikat</a></h4>
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
// let data=[]

// $('#formA').on('submit', function (event){
//     event.preventDefault()  //untuk melakukan keep data agar tidak menjadi json masuk ke
//     submitform() //mengirimkan data ke database
    
// })

// function submitform(){
//     let form = $('#formA');
//     const url = "{{ url('addform') }}"; //menggunakan url yang dibuat, data dapat dilihat pada network.

//     $.ajax({
//         url,
//         method: "POST",
//         data:form.serialize(),

//         success:function(response){
//             console.log(response)
//             clearform() //untuk hapus isi data
//             refreshTable() //untuk merefresh halaman
//         },
//         error:function(ee){
//             console.log(ee)
//             alert("Kesalahan Input") //warning jika ada kesalahan
//         }
//     })
// }


function clearform(){
    $("#formA [name='nama_kompetisi']").val('')
    $("#formA [name='nama_ketua']").val('')
    $("#formA [name='dosen_pembimbing']").val('')
    $("#formA [name='nama_kelompok']").val('')
    $("#formA [name='tingkatan']").val('')
    $("#formA [name='waktu_pelaksanaan']").val('')
    $("#formA [name='anggota1']").val('')
    $("#formA [name='anggota2']").val('')
    $("#formA [name='anggota3']").val('')
    $("#formA [name='pendanaan']").val('')
    $("#formA [name='proposal']").val('')
    

}

function refreshTable(){
    table.ajax.reload(function(){
    },true);
    
}



</script>

@endpush
