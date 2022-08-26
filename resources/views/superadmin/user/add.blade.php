@extends('layouts/indexmaster')
@section('judul_halaman', 'Add Jurusan Mahasiswa')

@section('konten')
    <form action="{{route('save.user')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">
                Username
            </label>
            <input type="text" name="iusername" placeholder="Masukkan Roles." class="form-control">
        </div>
        <div class="form-group">
            <label for="">
                NIM/NIP/NIPPK
            </label>
            <input type="text" name="inim" placeholder="Masukkan Roles." class="form-control">
        </div>
        <div class="form-group">
            <label for="">
                Email
            </label>
            <input type="text" name="iemail" placeholder="Masukkan Roles." class="form-control">
        </div>
        <div class="form-group">
            <label for="">
                Password
            </label>
            <input type="password" name="ipassword" placeholder="Masukkan Roles." class="form-control">
        </div>
        <div class="form-group">
            <label for="">
                Peran
            </label>
            <select name="irole_id" id="" class="form-control selectric">
                @foreach($role as $value)
                    <option value="{{$value->id}}">{{$value->sebagai}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>

@endsection