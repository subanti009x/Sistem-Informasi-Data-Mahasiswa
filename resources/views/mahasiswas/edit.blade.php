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

    <form class="row g-2" action="{{ route('mahasiswas.update', $dataMahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="nama" class="form-control" value="{{ old('nama', $dataMahasiswa->nama) }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="nim" class="form-control" value="{{ old('nim', $dataMahasiswa->nim) }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="email" name="email" class="form-control" value="{{ old('email', $dataMahasiswa->email) }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
  
            <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $dataMahasiswa->jurusan) }}" required>
        </div>

        <button type="button" class="btn btn-link text-dark" data-bs-toggle="modal" data-bs-target="#mataKuliahModal{{ $dataMahasiswa->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
            </svg>
        </button>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            
            <div class="modal fade" id="mataKuliahModal{{ $dataMahasiswa->id }}" tabindex="-1" aria-labelledby="mataKuliahModalLabel{{ $dataMahasiswa->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mataKuliahModalLabel{{ $dataMahasiswa->id }}">Mata Kuliah Yang Diambil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach(json_decode($dataMahasiswa->nama_mata_kuliah) as $mata_kuliah)
                                <span>{{ $mata_kuliah }}</span><br>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <select name="nama_mata_kuliah[]" class="form-control" multiple required>
                @foreach($mata_kuliahs as $mata_kuliah)
                    <option value="{{ $mata_kuliah->nama_mata_kuliah }}" 
                        @if(in_array($mata_kuliah->nama_mata_kuliah, json_decode($dataMahasiswa->nama_mata_kuliah, true))) selected @endif>
                        {{ $mata_kuliah->nama_mata_kuliah }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-dark mt-2">Update</button>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection