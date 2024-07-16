@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])

@section('content')
    <div class="card">
        <h5 class="card-header">Data Pendaftaran</h5>
        <div class="card-body">
            <h3>Data Pendaftaran</h3>
            <a href="/daftar/create" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>TANGGAL DAFTAR</th>
                        <th>POLI</th>
                        <th>KELUHAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pasien ? $item->pasien->nama : 'Pasien tidak ditemukan' }}</td>
                            <td>{{ $item->pasien ? $item->pasien->jenis_kelamin : '-' }}</td>
                            <td>{{ $item->tanggal_daftar }}</td>
                            <td>{{ $item->poli }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td>
                                <a href="/daftar/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                                <form action="/daftar/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $daftar->links() !!}
        </div>
    </div>
@endsection
