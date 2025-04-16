@extends('layout')
@section('content')
<h2>Edit Kriteria</h2>
<form action="{{ route('kriterias.update', $kriteria) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
        <input type="text" name="nama_kriteria" class="form-control" value="{{ $kriteria->nama_kriteria }}" required>
    </div>
    <div class="mb-3">
        <label for="bobot_awal" class="form-label">Bobot Awal</label>
        <input type="number" name="bobot_awal" class="form-control" value="{{ $kriteria->bobot_awal }}" required min="1">
    </div>
    <button class="btn btn-primary" type="submit">Perbarui</button>
</form>
@endsection