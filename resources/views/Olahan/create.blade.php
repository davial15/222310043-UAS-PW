@extends('layout.app')

@section('content')
    <div class="container m-4">
        <nav class="navbar bg-body-tertiary" style="margin-bottom: 10px">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span class="fw-bold">Buat Olahan Baru</span>
                </a>
            </div>
        </nav>
        <form action="/olahan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Olahan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="nama_olahan">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Bahan</label>
                <select class="form-select" aria-label="Default select example" style="width: 15%" name="sampah_id">
                    <option selected>Pilih Sampah</option>
                    @foreach ($sampahs as $sampah)
                        <option value={{ $sampah->id }}>{{ $sampah->nama_sampah }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Tambahkan Gambar</label>
                <input class="form-control" type="file" id="formFile" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
