@extends('home')
@section('content')
<form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama Guru">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Masukan Lokasi">
                @error('alamat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <strong>Mata Pelajaran:</strong>
                <select name="matapelajaran" class="form-control">
                    <option value="">Pilih Mata Pelajaran</option>
                    <option value="Kimia">Kimia</option>
                    <option value="Fisika">Fisika</option>
                    <option value="Geografi">Geografi</option>
                    <option value="Matematika">Matematika</option>
                    <!-- Tambahkan opsi mata pelajaran yang lain sesuai kebutuhan -->
                </select>
                @error('matapelajaran')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('teachers.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection