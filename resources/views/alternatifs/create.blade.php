@extends('layout')
@section('content')
<h2>Tambah Alternatif</h2>
<form action="{{ route('alternatifs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
        <input type="text" name="nama_alternatif" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <h4>Input Skor untuk Setiap Kriteria</h4>
    @foreach($kriterias as $kriteria)
    <div class="mb-3">
        <label class="form-label">{{ $kriteria->nama_kriteria }} (Skor 0 - 1)</label>
        <input type="number" name="score[{{ $kriteria->id }}]" class="form-control" step="0.01" min="0" max="1" required>
    </div>
    @endforeach
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>
@endsection