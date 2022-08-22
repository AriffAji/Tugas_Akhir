@extends('layouts/indexmaster')
@section('judul_halaman', 'EDIT ROLE')

@section('konten')
    <form action="{{route('update.roles', $id->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label 
            @error('sebagai')
                class="text-danger"                
            @enderror>
            Sebagai
            @error('sebagai')
                | {{$message}}
            @enderror
            </label>
            <input type="text" name="isebagai" placeholder="Masukkan ID pekerjaan" class="form-control"
            @if (old('sebagai'))
                value="{{old('sebagai')}}"
            @else 
                value="{{$id->sebagai}}"
            @endif>
        </div>
        
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

@endsection