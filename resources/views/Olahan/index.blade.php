@extends('layout.app')

@section('content')
    <div class="container" style="margin-top: 5px;">
        <nav class="navbar bg-body-tertiary" style="margin-bottom: 10px">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <div class="fw-bold ">
                        <span class="text-center">Daftar Olahan</span>
                    </div>
                </a>
            </div>
        </nav>
        <div class="mb-3">
            <a href="/olahan/create">
                <button class="btn fw-bold" style="background-color: #B6E7CA">Tambah Olahan</button>
            </a>
        </div>
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Olahan</th>
                            <th scope="col">Bahan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($olahans as $olahan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $olahan->nama_olahan }}</td>
                                <td>{{ $olahan->sampah->nama_sampah }}</td>
                                <td>{{ Str::limit($olahan->deskripsi, 20) }}</td>
                                <td><img src="/storage/olahan/{{ $olahan->gambar }}" alt="" width="100px"
                                        height="50px"></td>
                                <td>{{ $olahan->created_at }}</td>
                                <td>
                                    <a href="/olahan/{{ $olahan->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/olahan/{{ $olahan->id }}" method="POST" style="display:inline;"
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
