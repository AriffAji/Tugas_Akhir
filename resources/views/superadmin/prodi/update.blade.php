@extends('layouts/indexmaster')
@section('judul_halaman', 'EDIT ROLE')

@section('konten')
    <form action="{{route('update.roles', $ID->ID)}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label 
            @error('program_studi')
                class="text-danger"                
            @enderror>
            Program Studi
            @error('program_studi')
                | {{$message}}
            @enderror
            </label>
            <input type="program_studi" name="iprogram_studi" placeholder="Masukkan ID pekerjaan" class="form-control"
            @if (old('program_studi'))
                value="{{old('program_studi')}}"
            @else 
                value="{{$ID->program_studi}}"
            @endif>
        </div>
        
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

@endsection