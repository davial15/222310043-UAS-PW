@extends('layout.app')

@section('content')
    <div class="container m-4">
        <nav class="navbar bg-body-tertiary" style="margin-bottom: 10px">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span class="fw-bold">Buat Sampah Baru</span>
                </a>
            </div>
        </nav>
        <form action="/sampah" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Sampah</label>
                <input name="nama_sampah" type="text" class="form-control" id="nama_sampah">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" aria-label="Default select example" name="kategori">
                    <option selected>Pilih Kategori Sampah</option>
                    <option value="Organik">Organik</option>
                    <option value="Anorganik">Anorganik</option>
                    <option value="B3">B3</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Tambahkan Gambar Sampah</label>
                <input name="gambar" class="form-control" type="file" id="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
