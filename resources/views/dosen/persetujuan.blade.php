@extends('layouts/indexmaster')
@section('judul_halaman', 'Persetujuan Kompetisi')

@section('konten')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" style="border-radius:10px" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <br>
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
                                    <th class="text-center">waktu_pelaksanaan</th>
                                    <th class="text-center">Proposal</th>
                                    <th class="text-center">Pendanaan</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                @foreach ($review2 as $nm)
                                    <tr>
                                        <td>{{ $number }}</td>
                                        <td class="text-center">{{ $nm->nama_kompetisi }}</td>
                                        <td class="text-center">{{ $nm->nama_ketua }}</td>
                                        <td class="text-center">{{ $nm->dosen_pembimbing }}</td>
                                        <td class="text-center">{{ $nm->nama_kelompok }}</td>
                                        <td class="text-center">{{ date('d F Y', strtotime($nm->waktu_pelaksanaan)) }}</td>
                                        <td class="text-center"><a href="{{ asset('/storage/proposal/' . $nm->proposal) }}"
                                                target="_blank">{{ $nm->proposal }} </td>
                                        {{-- <td class="text-center">{{ $nm->waktu_pelaksanaan }}</td> --}}
                                        <td class="text-center">{{ $nm->pendanaan }}</td>
                                        <td class="text-center text-nonwrap">
                                            <a href="{{ route('dosen.edit', $nm->ID) }}"
                                                class="btn btn-primary btn-action mr-1 "><i class="fas fa-check-double">
                                                    Approval</i></a>
                                            {{-- <a href="{{ route('download.proposal', $nm->ID)}}" class="btn btn-success btn-action mr-1 "><i class="fas fa-check-double"> Downnload</i></a>                        --}}
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
