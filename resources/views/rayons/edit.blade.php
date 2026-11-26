@extends('rayons.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Rayon</h2>
    <div class="card-body">
        <form action="{{ route('rayons.update', $rayon->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
                <input type="text" name="nama_rayon" value="{{ old('nama_rayon', $rayon->nama_rayon) }}" class="form-control @error('nama_rayon') is-invalid @enderror" id="inputRayon">
                @error('nama_rayon')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-secondary" href="{{ route('rayons.index') }}">Back</a>
        </form>
    </div>
</div>
@endsection
