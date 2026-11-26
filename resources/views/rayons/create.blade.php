
@extends('rayons.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Rayon</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('rayons.index') }}">
                Back
            </a>
        </div>

        <form action="{{ route('rayons.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label"><strong>Rayon:</strong></label>

                <input
                    type="text"
                    name="nama_rayon"
                    class="form-control @error('nama_rayon') is-invalid @enderror"
                    placeholder="Rayon"
                    value="{{ old('nama_rayon') }}"
                >

                @error('nama_rayon')
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
