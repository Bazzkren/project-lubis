
@extends('rombels.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Rombel</h2>

    <div class="card-body">
        <form action="{{ route('rombels.update', $rombel->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputRombel" class="form-label">
                    <strong>Rombel:</strong>
                </label>

                <input
                    type="text"
                    name="nama_rombel"
                    value="{{ old('nama_rombel', $rombel->nama_rombel) }}"
                    class="form-control @error('nama_rombel') is-invalid @enderror"
                    id="inputRombel"
                >

                @error('nama_rombel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-secondary" href="{{ route('rombels.index') }}">Back</a>
        </form>
    </div>
</div>

@endsection
