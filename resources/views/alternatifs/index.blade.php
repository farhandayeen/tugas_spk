@extends('layout')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Data Alternatif</h2>
    <a href="{{ route('alternatifs.create') }}" class="btn btn-primary">Tambah Alternatif</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Alternatif</th>
            <th>Deskripsi</th>
            <th>Skor (per kriteria)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alternatifs as $alt)
        <tr>
            <td>{{ $alt->id }}</td>
            <td>{{ $alt->nama_alternatif }}</td>
            <td>{{ $alt->deskripsi }}</td>
            <td>
                <ul>
                    @foreach($alt->nilaiAlternatifs as $nilai)
                    <li>{{ $nilai->kriteria->nama_kriteria }}: {{ $nilai->skor }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a href="{{ route('alternatifs.edit', $alt) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('alternatifs.destroy', $alt) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus alternatif?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection