
@extends('rombels.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Rombel</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('rombels.index') }}">
                Back
            </a>
        </div>

        <form action="{{ route('rombels.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label"><strong>Rombel:</strong></label>

                <input
                    type="text"
                    name="nama_rombel"
                    class="form-control @error('nama_rombel') is-invalid @enderror"
                    placeholder="Rombel"
                    value="{{ old('nama_rombel') }}"
                >

                @error('nama_rombel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                Submit
            </button>
        </form>

    </div>
</div>

@endsection
