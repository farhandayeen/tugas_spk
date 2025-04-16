@extends('layout')
@section('content')
<h2>Edit Alternatif</h2>
<form action="{{ route('alternatifs.update', $alternatif) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
        <input type="text" name="nama_alternatif" class="form-control" value="{{ $alternatif->nama_alternatif }}" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $alternatif->deskripsi }}</textarea>
    </div>
    <h4>Perbarui Skor untuk Setiap Kriteria</h4>
    @foreach($kriterias as $kriteria)
    <div class="mb-3">
        <label class="form-label">{{ $kriteria->nama_kriteria }} (Skor 0 - 1)</label>
        <input type="number" name="score[{{ $kriteria->id }}]" class="form-control" step="0.01" min="0" max="1" value="{{ $scores[$kriteria->id] ?? '' }}" required>
    </div>
    @endforeach
    <button class="btn btn-primary" type="submit">Perbarui</button>
</form>
@endsection