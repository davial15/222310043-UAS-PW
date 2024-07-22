@extends('layout.app')

@section('content')
    <div class="container" style="margin-top: 5px;">
        <nav class="navbar bg-body-tertiary" style="margin-bottom: 10px">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span class="fw-bold">Daftar Sampah</span>
                </a>
            </div>
        </nav>
        <div class="mb-3">
            <a href="/sampah/create">
                <button class="btn fw-bold" style="background-color: #B6E7CA">Tambah Sampah</button>
            </a>
        </div>
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Sampah</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sampahs as $sampah)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sampah->nama_sampah }}</td>
                                <td>{{ $sampah->kategori }}</td>
                                <td>{{ Str::limit($sampah->deskripsi, 20) }}</td>
                                <td><img src="/storage/sampah/{{ $sampah->gambar }}" alt="" width="100px"
                                        height="50px"></td>
                                <td>{{ $sampah->created_at }}</td>
                                <td>
                                    <a href="/sampah/{{ $sampah->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/sampah/{{ $sampah->id }}" method="POST" style="display:inline;"
                                        onclick="confirm('Hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
