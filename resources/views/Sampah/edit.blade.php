@extends('layout.app')

@section('content')
    <div class="container m-4">
        <nav class="navbar bg-body-tertiary" style="margin-bottom: 10px">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span class="fw-bold">Edit Sampah</span>
                </a>
            </div>
        </nav>
        <form action="/sampah/{{ $sampah->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Nama Sampah</label>
                <input name="nama_sampah" type="text" class="form-control" id="nama_sampah"
                    value={{ $sampah->nama_sampah }}>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" aria-label="Default select example" name="kategori">
                    <option>Pilih Kategori Sampah</option>
                    <option value="Organik" {{ $sampah->kategori == 'Organik' ? 'selected' : '' }}>Organik</option>
                    <option value="Anorganik" {{ $sampah->kategori == 'Anorganik' ? 'selected' : '' }}>Anorganik
                    </option>
                    <option value="B3" {{ $sampah->kategori == 'B3' ? 'selected' : '' }}>B3</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ $sampah->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Tambahkan Gambar Sampah</label>
                <input name="gambar" class="form-control" type="file" id="gambar" value={{ $sampah->gambar }}>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
