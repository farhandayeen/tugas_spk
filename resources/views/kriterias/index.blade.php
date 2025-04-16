@extends('layout')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Data Kriteria</h2>
    <a href="{{ route('kriterias.create') }}" class="btn btn-primary">Tambah Kriteria</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kriteria</th>
            <th>Bobot Awal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kriterias as $kriteria)
        <tr>
            <td>{{ $kriteria->id }}</td>
            <td>{{ $kriteria->nama_kriteria }}</td>
            <td>{{ $kriteria->bobot_awal }}</td>
            <td>
                <a href="{{ route('kriterias.edit', $kriteria) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kriterias.destroy', $kriteria) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kriteria ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection