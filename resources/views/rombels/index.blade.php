@extends('rombels.layout')
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

<div class="modal fade" id="createRombelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="createRombelModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createRombelModalLabel">Tambah Data Rombel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('rombels.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="inputRombel" class="form-label"><strong>Rombel:</strong></label>
                                    <input type="text" name="nama_rombel" value="{{ old('nama_rombel') }}"
                                        class="form-control @error('nama_rombel') is-invalid @enderror" id="inputRombel"
                                        placeholder="Masukkan Nama Rombel">
                                    @error('nama_rombel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-solid fa-floppy-disk"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
        <h2 class="card-header">Data Rombel</h2>
        <div class="card-body">


            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRombelModal">
                    <i class="fa-solid fa-plus"></i> New
                </button>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Rombel</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rombels as $rombel)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rombel->nama_rombel }}</td>
                            <td>
                                <form action="{{ route('rombels.destroy', $rombel->id) }}"
                                    method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus data rombel ini?')">
                                        <a class="btn btn-info btn-sm" href="{{ route('rombels.show', $rombel->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('rombels.edit', $rombel->id) }}">Edit</a>
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
                new bootstrap.Modal(document.getElementById('createRombelModal')).show();
            });
        </script>
    @endif
@endpush
