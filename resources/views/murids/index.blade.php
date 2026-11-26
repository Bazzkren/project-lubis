@extends('murids.layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="{{ route('murids.index') }}">
                Data Sekolah SMK Negri 1 Lubis
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('murids.index') }}">
                            Data Siswa
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rombels.index') }}">
                            Rombel
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rayons.index') }}">
                            Rayon
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>


    <div class="card mt-5">
        <h2 class="card-header">Data Siswa</h2>
        <div class="card-body">


            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMuridModal">
                    <i class="fa-solid fa-plus"></i> New
                </button>
            </div>

            <div class="modal fade" id="createMuridModal" tabindex="-1" aria-labelledby="createMuridModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('murids.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="createMuridModalLabel">Tambah Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="inputNisn" class="form-label"><strong>NIS:</strong></label>
                                    <input type="number" name="nisn" value="{{ old('nisn') }}" class="form-control @error('nisn') is-invalid @enderror" id="inputNisn">
                                    @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputNama" class="form-label"><strong>Nama:</strong></label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="inputNama">
                                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputRombel" class="form-label"><strong>Rombel:</strong></label>
                                    <input type="text" name="rombel" value="{{ old('rombel') }}" class="form-control @error('rombel') is-invalid @enderror" id="inputRombel">
                                    @error('rombel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
                                    <input type="text" name="rayon" value="{{ old('rayon') }}" class="form-control @error('rayon') is-invalid @enderror" id="inputRayon">
                                    @error('rayon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputAlamat" class="form-label"><strong>Alamat:</strong></label>
                                    <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat">
                                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputNoTelp" class="form-label"><strong>No Telp:</strong></label>
                                    <input type="text" name="no_telp" value="{{ old('no_telp') }}" class="form-control @error('no_telp') is-invalid @enderror" id="inputNoTelp">
                                    @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputJenisKelamin" class="form-label"><strong>Jenis Kelamin:</strong></label>
                                    <select id="inputJenisKelamin" name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                        <option value="">--PILIH JENIS KELAMIN--</option>
                                        <option value="L" @selected(old('jenis_kelamin') === 'L')>Laki-laki</option>
                                        <option value="P" @selected(old('jenis_kelamin') === 'P')>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Rombel</th>
                        <th>Rayon</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Jk</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($murids as $murid)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $murid->nisn }}</td>
                            <td>{{ $murid->nama }}</td>
                            <td>{{ $murid->rombel }}</td>
                            <td>{{ $murid->rayon }}</td>
                            <td>{{ $murid->alamat }}</td>
                            <td>{{ $murid->no_telp }}</td>
                            <td>{{ $murid->jenis_kelamin }}</td>
                            <td>
                                <form action="{{ route('murids.destroy', $murid->id) }}"
                                    method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus data murid ini?')">
                                        <a class="btn btn-info btn-sm" href="{{ route('murids.show', $murid->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('murids.edit', $murid->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')

    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        @endsection

@push('scripts')
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new bootstrap.Modal(document.getElementById('createMuridModal')).show();
            });
        </script>
    @endif
@endpush
