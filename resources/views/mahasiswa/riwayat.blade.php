@extends('layouts/indexmaster')
@section('judul_halaman', 'Riwayat')

@section('konten')
    <div class="row mb-5">
        <div class="col-5 ">
            <label for="">Tahun :</label>
            <select name="" id="" class="form-control selectric">
                <?php
                    $now=date('Y');
                     for ($i=2015; $i<=$now ; $i++) {
                ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                    }
                ?>
                {{-- <option value="">2022</option>
                <option value="">2021</option> --}}
            </select>
        </div>
        <div class="col-5">
            <label for="">Jenis Kompetisi :</label>
            <select name="" id="" class="form-control selectric ">
                <option value="">PKM</option>
                <option value="">
                    @foreach ($riwayat as $nm)
                        <td class="text-center">{{ $nm->nama_kompetisi }}</td>
                    @endforeach
                </option>
            </select>
        </div>
        <div class="col-2" style="margin-top: 30px">
            <button class="btn btn-primary" type="submit"> Search</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table table-hover" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">Nama Kompetisi</th>
                                    <th class="text-center">Nama Ketua</th>
                                    <th class="text-center">Dosen Pembimbing</th>
                                    <th class="text-center">Nama Kelompok</th>
                                    <th class="text-center">Anggota 1</th>
                                    <th class="text-center">Anggota 2</th>
                                    <th class="text-center">Anggota 3</th>
                                    <th class="text-center">Tingkatan</th>
                                    <th class="text-center">Pendanaan</th>
                                    <th class="text-center">Waktu Pelaksanaan</th>
                                    <th class="text-center">Proposal</th>
                                    <th class="text-center">Sertifikat</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                @foreach ($riwayat as $nm)
                                    <tr>
                                        <td>{{ $number }}</td>
                                        <td class="text-center">{{ $nm->nama_kompetisi }}</td>
                                        <td class="text-center">{{ $nm->nama_ketua }}</td>
                                        <td class="text-center">{{ $nm->dosen_pembimbing }}</td>
                                        <td class="text-center">{{ $nm->nama_kelompok }}</td>
                                        <td class="text-center">{{ $anggota1->anggota1 }}</td>
                                        <td class="text-center">{{ $anggota2->anggota2 }}</td>
                                        <td class="text-center">{{ $anggota3->anggota3 }}</td>
                                        <td class="text-center">{{ $nm->tingkatan }}</td>
                                        <td class="text-center">{{ $nm->pendanaan }}</td>
                                        <td class="text-center">{{ $nm->waktu_pelaksanaan }}</td>
                                        <td class="text-center"><a href="{{ asset('/storage/proposal/' . $nm->proposal) }}"
                                                target="_blank">{{ $nm->proposal }} </td>
                                        <td class="text-center"><a
                                                href="{{ asset('/storage/sertifikat/' . $nm->sertifikat) }}"
                                                target="_blank">{{ $nm->sertifikat }} </td>
                                        <td class="text-center ">{{ $nm->status }}</td>
                                    </tr>
                                    <?php $number++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
    <script rel="stylesheet"
        src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
    <script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}">
    </script>
@endpush
