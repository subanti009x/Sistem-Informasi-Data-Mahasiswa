@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container mt-5">


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-1" action="{{ route('mahasiswas.store') }}" method="POST">
        @csrf

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
  
            <input type="text" name="nama" class="form-control border-2 " placeholder="Nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
  
            <input type="text" name="nim" class="form-control border-2" placeholder="NIM" value="{{ old('nim') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="email" name="email" class="form-control border-2" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="jurusan" class="form-control border-2" placeholder="Jurusan" value="{{ old('jurusan') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            <select name="nama_mata_kuliah[]" class="form-control" multiple required>
                @foreach($mata_kuliahs as $mata_kuliah)
                    <option value="{{ $mata_kuliah->nama_mata_kuliah }}">{{ $mata_kuliah->nama_mata_kuliah }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-dark mt-2">Simpan</button>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection