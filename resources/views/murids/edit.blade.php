@extends('murids.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Murid</h2>
    <div class="card-body">
        <form action="{{ route('murids.update', $murid->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputNisn" class="form-label"><strong>NIS:</strong></label>
                <input type="number" name="nisn" value="{{ old('nisn', $murid->nisn) }}" class="form-control @error('nisn') is-invalid @enderror" id="inputNisn">
                @error('nisn')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputNama" class="form-label"><strong>Name:</strong></label>
                <input type="text" name="nama" value="{{ old('nama', $murid->nama) }}" class="form-control @error('nama') is-invalid @enderror" id="inputNama">
                @error('nama')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputRombel" class="form-label"><strong>Rombel:</strong></label>
                <input type="text" name="rombel" value="{{ old('rombel', $murid->rombel) }}" class="form-control @error('rombel') is-invalid @enderror" id="inputRombel">
                @error('rombel')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
                <input type="text" name="rayon" value="{{ old('rayon', $murid->rayon) }}" class="form-control @error('rayon') is-invalid @enderror" id="inputRayon">
                @error('rayon')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputAlamat" class="form-label"><strong>Alamat:</strong></label>
                <input type="text" name="alamat" value="{{ old('alamat', $murid->alamat) }}" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat">
                @error('alamat')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputNoTelp" class="form-label"><strong>No Telp:</strong></label>
                <input type="text" name="no_telp" value="{{ old('no_telp', $murid->no_telp) }}" class="form-control @error('no_telp') is-invalid @enderror" id="inputNoTelp">
                @error('no_telp')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputJenisKelamin" class="form-label"><strong>Jk:</strong></label>
                <select id="inputJenisKelamin" name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">--PILIH JENIS KELAMIN--</option>
                    <option value="L" @selected(old('jenis_kelamin', $murid->jenis_kelamin) === 'L')>Laki-laki</option>
                    <option value="P" @selected(old('jenis_kelamin', $murid->jenis_kelamin) === 'P')>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-secondary" href="{{ route('murids.index') }}">Back</a>
        </form>
    </div>
</div>
@endsection