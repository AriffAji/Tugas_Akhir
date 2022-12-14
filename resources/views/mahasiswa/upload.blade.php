@extends('layouts.indexmaster')
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Form Upload Sertifikat Lomba')

@section('konten')

    <div>

        <div class="col">
            <form class="card" action="{{ route('mahasiswa.update', $ID->ID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-header" id="form-warna">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" style="border-radius:10px" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" style="border-radius:10px"
                            role="alert">
                            {{ session()->get('loginError') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <br>

                    {{-- MUST READONLY --}}
                </div>
                <div class="shadow p-3 mb-5 bg-body " style="border-radius:5px">
                    <div class="form-group form-floating">
                        <div class="row">
                            {{-- Harus Readonly --}}
                            <div class="card-body col-6">

                                <div class="row">

                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('nama_kompetisi')
                                                            class="text-danger"                
                                                        @enderror>
                                            Nama Kompetisi
                                            @error('nama_kompetisi')
                                                | {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="nama_kompetisi" class="form-control"
                                            placeholder="Masukkan Nama Kompetisi . . . . " readonly
                                            @if (old('nama_kompetisi')) value="{{ old('nama_kompetisi') }}"
                                                @else 
                                                    value="{{ $ID->nama_kompetisi }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('nama_ketua')
                                                            class="text-danger"                
                                                        @enderror>
                                            Nama Ketua
                                            @error('nama_ketua')
                                                | {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="100" name="nama_ketua" readonly
                                            class="form-control"
                                            @if (old('nama_ketua')) value="{{ old('nama_ketua') }}"
                                                @else 
                                                    value="{{ $ID->nama_ketua }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px" hidden>
                                        <label for=""
                                            @error('dosen_pembimbing')
                                                            class="text-danger"                
                                                        @enderror>
                                            Dosen Pembimbing
                                            @error('dosen_pembimbing')
                                                | {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="100" name="dosen_pembimbing" class="form-control"
                                            readonly
                                            @if (old('dosen_pembimbing')) value="{{ old('dosen_pembimbing') }}"
                                                    @else 
                                                        value="{{ $ID->dosen_pembimbing }}" @endif>

                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('nama_kelompok')
                                                            class="text-danger"                
                                                        @enderror>
                                            Nama Kelompok
                                            @error('nama_kelompok')
                                                | {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="nama_kelompok" class="form-control"
                                            readonly
                                            @if (old('nama_kelompok')) value="{{ old('nama_kelompok') }}"
                                                    @else 
                                                        value="{{ $ID->nama_kelompok }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('tingkatan')
                                                            class="text-danger"                
                                                        @enderror>
                                            Nama Kelompok
                                            @error('tingkatan')
                                                | {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="tingkatan" class="form-control" readonly
                                            @if (old('tingkatan')) value="{{ old('tingkatan') }}"
                                                    @else 
                                                        value="{{ $ID->tingkatan }}" @endif>

                                    </div>
                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('waktu_pelaksanaan')
                                                            class="text-danger"                
                                                        @enderror>
                                            Waktu Pelaksanaan
                                            @error('waktu_pelaksanaan')
                                                | {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="waktu_pelaksanaan" class="form-control"
                                            readonly
                                            @if (old('waktu_pelaksanaan')) value="{{ old('waktu_pelaksanaan') }}"
                                                    @else 
                                                        value="{{ $ID->waktu_pelaksanaan }}" @endif>
                                        {{-- value="{{ date('d F Y', strtotime($ID->waktu_pelaksanaan)) }}" @endif> --}}

                                    </div>

                                </div>
                            </div>
                            {{-- Harus Readonly --}}

                            <div class="card-body col-6">
                                <div class="row">
                                    {{-- Harus ReadOnly2 --}}
                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('anggota1')
                                            class="text-danger"                
                                        @enderror>
                                            Nama Anggota 1
                                            @error('anggota1')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="anggota1" class="form-control" readonly
                                            @if (old('anggota1')) value="{{ old('anggota1') }}"
                                        @else 
                                            value="{{ $anggota1->anggota1 }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('anggota2')
                                            class="text-danger"                
                                        @enderror
                                            Nama Anggota 2>
                                            @error('anggota2')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="anggota2" class="form-control" readonly
                                            @if (old('anggota2')) value="{{ old('anggota2') }}"
                                        @else 
                                            value="{{ $anggota2->anggota2 }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('anggota3')
                                            class="text-danger"                
                                        @enderror>
                                            Nama Anggota 3
                                            @error('anggota3')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="anggota3" class="form-control" readonly
                                            @if (old('anggota3')) value="{{ old('anggota3') }}"
                                        @else 
                                            value="{{ $anggota3->anggota3 }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <label for=""
                                            @error('pendanaan')
                                            class="text-danger"                
                                        @enderror>
                                            Pendanaan
                                            @error('pendanaan')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="pendanaan" class="form-control"
                                            readonly
                                            @if (old('pendanaan')) value="{{ old('pendanaan') }}"
                                        @else 
                                            value="{{ $ID->pendanaan }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px" hidden>
                                        <label for=""
                                            @error('prodi')
                                            class="text-danger"                
                                        @enderror>
                                            Program Studi
                                            @error('prodi')
                                                {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="program_studi" class="form-control"
                                            readonly
                                            @if (old('prodi')) value="{{ old('prodi') }}"
                                        @else 
                                            value="{{ $ID->prodi }}" @endif>
                                    </div>

                                    <div class="col-12 " style="margin-bottom: 12px" hidden>
                                        <label for=""
                                            @error('proposal')
                                                class="text-danger"
                                            @enderror>
                                            Proposal
                                            @error('proposal')
                                                | {{ $message }}
                                            @enderror
                                        </label>
                                        <input type="text" maxlength="12" name="proposal" class="form-control"
                                            readonly
                                            @if (old('proposal')) value="{{ old('proposal') }}"
                                        @else 
                                            value="{{ $ID->proposal }}" @endif>
                                    </div>
                                    {{-- Harus ReadOnly2 --}}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <br>
                <br>

                <div class="shadow p-3 mb-5 bg-body " style="border-radius:5px">
                    <div class="form-group form-floating">
                        <div class="row col-12">
                            <div class="card-body col-12">
                                <input type="hidden" maxlength="12" name="status" class="form-control"
                                    value="0">
                                <div class="row">
                                    <div class=" col-12" style="margin-bottom: 12px">
                                        <label for="">Prestasi</label>
                                        <select name="prestasi" id="" class="form-control selectric">
                                            <option>Pilih Prestasi</option>
                                            <option>Juara</option>
                                            <option>Peserta</option>

                                        </select>
                                    </div>
                                    <div class=" col-12" style="margin-bottom: 12px">
                                        <label for="">Penyerapan Dana</label>
                                        <input type="text" maxlength="12" name="penyerapan_dana" class="form-control"
                                            placeholder="Masukkan Nama Kompetisi . . . .">
                                    </div>
                                    <div class=" col-12" style="margin-bottom: 12px">
                                        <label for="">Sertifikat</label>
                                        <input type="file" name="sertifikat" class="form-control"
                                            class="form-control @error('sertifikat') is-invalid @enderror">
                                        @error('sertifikat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        {{-- <input type="file" maxlength="12" name="sertifikat" class="form-control"
                                            placeholder="Masukkan Nama Kompetisi . . . ."> --}}
                                        <sub>Note : Penamaan File(NamaKompetisi_NamaKelompok_NamaKetuaKelompok.pdf)</sub>
                                    </div>
                                    <div class="col-12 " style="margin-bottom: 12px">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-footer" style="text-align: right; margin-right:2%">
                    <button type="button" class="btn btn-secondary " onclick="clearform()"
                        id="tombolClear">Clear</button>
                    <button type="submit" class="btn btn-primary">Setujui</button>

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


function clearform(){
    $("#formA [name='nama_kelompok']").val('')
    $("#formA [name='prestasi']").val('')
    $("#formA [name='penerapan_dana']").val('')
    $("#formA [name='sertifikat']").val('')
   
}

function refreshTable(){
    table.ajax.reload(function(){
    },true);
    
}


</script>
@endpush
