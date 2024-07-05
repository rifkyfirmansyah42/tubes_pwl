@extends('layouts.app', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pendaftaran</h5>
        <div class="card-body">
            <h3>Data Pasien</h3>
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
                        <td>{{ $item->pasien->nama }}</td>
                        <td>{{ $item->pasien->jenis_kelamin }}</td>
                        <td>{{ $item->tanggal_daftar }}</td>
                        <td>{{ $item->poli }}</td>
                        <td>{{ $item->keluhan }}</td>
                        <td>
                            <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                            <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin ?')">
                                    Hapus
                                </button>

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