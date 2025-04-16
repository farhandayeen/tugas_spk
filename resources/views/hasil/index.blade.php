@extends('layout')
@section('content')
<h2>Hasil Perhitungan Metode SMART</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Peringkat</th>
            <th>Alternatif</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $index => $result)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $result['nama_alternatif'] }}</td>
            <td>{{ $result['nilai_akhir'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection