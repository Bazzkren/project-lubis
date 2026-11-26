@extends('rayons.layout')
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

            <div class="modal fade" id="createRayonModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="createRayonModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createRayonModalLabel">Tambah Data Rayon</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('rayons.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
                                    <input type="text" name="nama_rayon" value="{{ old('nama_rayon') }}"
                                        class="form-control @error('nama_rayon') is-invalid @enderror" id="inputRayon"
                                        placeholder="Masukkan Nama Rayon">
                                    @error('nama_rayon')
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
    <h2 class="card-header">Data Rayon</h2>
    <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRayonModal">
                    <i class="fa-solid fa-plus"></i> New
                </button>
            </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Rayon</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($rayons as $rayon)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rayon->nama_rayon }}</td>
                        <td>
                            <form action="{{ route('rayons.destroy', $rayon->id) }}"
                                    method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus data rayon ini?')">
                                        <a class="btn btn-info btn-sm" href="{{ route('rayons.show', $rayon->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('rayons.edit', $rayon->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection

@push('scripts')
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new bootstrap.Modal(document.getElementById('createRayonModal')).show();
            });
        </script>
    @endif
@endpush
