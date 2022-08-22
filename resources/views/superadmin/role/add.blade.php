@extends('layouts/indexmaster')
@section('judul_halaman', 'Add Jurusan Mahasiswa')

@section('konten')
    <form action="{{route('save.roles')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">
                Sebagai
            </label>
            <input type="text" name="isebagai" placeholder="Masukkan Roles." class="form-control">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>

@endsection