@extends('layout')
@section('content')
<h2>Tambah Kriteria</h2>
<form action="{{ route('kriterias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
        <input type="text" name="nama_kriteria" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="bobot_awal" class="form-label">Bobot Awal (misal angka 1-10)</label>
        <input type="number" name="bobot_awal" class="form-control" required min="1">
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>
@endsection