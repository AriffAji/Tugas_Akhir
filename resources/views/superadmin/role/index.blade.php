@extends('layouts/indexmaster')
@section('judul_halaman', 'Roles')

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4><a href="{{route('add.roles')}}" class="btn btn-icon icon-left btn-primary"> Add Data</a></h4>
              </div>
            <div class="card-body">               
                <div class="table-responsive">
                    <table class="table table table-hover" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">ID Role</th>
                                <th class="text-center">Peran</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1;?>
                            @foreach($roles as $nm)
                            <tr>
                                <td>{{$number}}</td>
                                <td class="text-center">{{ $nm->id}}</td>
                                <td class="text-center">{{$nm->sebagai}}</td>
                                <td class="text-center text-nonwrap">
                                    <a href="{{ route('edit.roles',$nm->id) }}" class="btn btn-primary btn-action mr-1 "><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('hapus.roles',$nm->id) }}"  class="btn btn-danger btn-action mr-1" method="POST" onclick="return confirm('yakin?');"> 
                                        @csrf
                                        @method('delete')
                                        <i class="fas fa-trash"></i></a> 
                                </td>  
                                                   
                             </tr>
                    
                    
                             <?php $number++;?>  
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
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}"></script>

@endpush