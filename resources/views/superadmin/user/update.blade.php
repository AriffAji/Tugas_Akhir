@extends('layouts/indexmaster')
@section('judul_halaman', 'EDIT JURUSAN')

@section('konten')
    <form action="{{route('update.roles', $id->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label 
            @error('username')
                class="text-danger"                
            @enderror>
            Username
            @error('username')
                | {{$message}}
            @enderror
            </label>
            <input type="text" name="iusername" placeholder="Masukkan ID pekerjaan" class="form-control"
            @if (old('username'))
                value="{{old('username')}}"
            @else 
                value="{{$id->username}}"
            @endif>
        </div>
        <div class="form-group">
            <label 
            @error('nim')
                class="text-danger"                
            @enderror>
            NIM/NIP/NIPPPK
            @error('nim')
                | {{$message}}
            @enderror
            </label>
            <input type="text" name="inim" placeholder="Masukkan ID pekerjaan" class="form-control"
            @if (old('nim'))
                value="{{old('nim')}}"
            @else 
                value="{{$id->nim}}"
            @endif>
        </div>
        <div class="form-group">
            <label 
            @error('email')
                class="text-danger"                
            @enderror>
            Email
            @error('email')
                | {{$message}}
            @enderror
            </label>
            <input type="text" name="iemail" placeholder="Masukkan ID pekerjaan" class="form-control"
            @if (old('email'))
                value="{{old('email')}}"
            @else 
                value="{{$id->email}}"
            @endif>
        </div>
        
        <div class="form-group">
            <label 
            @error('password')
                class="text-danger"                
            @enderror>
            Password
            @error('password')
                | {{$message}}
            @enderror
            </label>
            <input type="password" name="ipassword" placeholder="Masukkan Password Anda" class="form-control">
        </div>
        <div class="form-group">
            <label 
            @error('role_id')
                class="text-danger"                
            @enderror>
            Peran
            @error('role_id')
                | {{$message}}
            @enderror
            </label>
            <select name="irole_id" id="" class="form-control selectric" >
                @foreach($role as $value)
                    <option value="{{$value->id}}">{{$value->sebagai}}</option>
                @endforeach
            </select>
            {{-- <input type="text" name="irole_id" placeholder="Konfirmasi Password Anda" class="form-control"   
            @if (old('role_id'))
                value="{{old('role_id')}}"
            @else 
                value="{{$id->role_id}}"
            @endif> --}}
        <br>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

@endsection