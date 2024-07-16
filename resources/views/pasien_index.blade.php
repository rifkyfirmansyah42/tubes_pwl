@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pasien</h5>
        <div class="card-body">
            <h3>Data Pasien</h3>
            <a href="/pasien/create" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO PASIEN</th>
                        <th>NAMA</th>
                        <th>UMUR</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>TANGGAL BUAT</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_pasien }}</td>
                        <td>
                            @if ($item->foto)
                            <a href="{{ Storage::url($item->foto) }}" target="blank">
                                <img src="{{ Storage::url($item->foto) }}" width="50">
                            </a>
                            @endif
                            {{ $item->nama }}
                        </td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin ?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $pasien->links() !!}
        </div>
    </div>
@endsection
