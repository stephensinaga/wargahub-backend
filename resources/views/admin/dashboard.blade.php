@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('contents')
    <h1>Welcome Admin</h1>
    <p>Ini adalah dashboard khusus admin.</p>

    <h3>10 Laporan Terbaru:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $key => $report)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $report->judul }}</td>
                    <td>{{ $report->category }}</td>
                    <td>{{ $report->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
