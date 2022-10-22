@extends('layouts/indexmaster')
@section('judul_halaman', 'Semua Data Mahasiswa')

@section('konten')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        <h4><a href="/exportsemua" class="btn btn-icon icon-left btn-primary"> Export PDF</a></h4>
                    </div>
                    <br>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table table-hover" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nama Kompetisi</th>
                                    <th class="text-center">Nama Ketua</th>
                                    <th class="text-center">Nama Kelompok</th>
                                    <th class="text-center">Dosen Pembimbing</th>
                                    <th class="text-center">Tingkatan</th>
                                    <th class="text-center">Pendanaan</th>
                                    <th class="text-center">Program Studi</th>
                                    <th class="text-center">Proposal</th>
                                    <th class="text-center">Sertifikat</th>
                                    <th class="text-center">Waktu Pelaksanaan</th>
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
                                        <td class="text-center">{{ $nm->prodi }}</td>
                                        <td class="text-center"><a href="{{ asset('/storage/proposal/' . $nm->proposal) }}"
                                                target="_blank">{{ $nm->proposal }} </td>
                                        <td class="text-center"><a
                                                href="{{ asset('/storage/sertifikat/' . $nm->sertifikat) }}"
                                                target="_blank">{{ $nm->sertifikat }} </td>
                                        <td class="text-center">{{ $nm->waktu_pelaksanaan }}</td>
                                        <td class="text-center">
                                            @if ($nm->status == 'Sedang Mengikuti Lomba')
                                                <span class="badge badge-warning">{{ $nm->status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $nm->status }}</span>
                                            @endif
                                        </td>
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
