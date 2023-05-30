@extends('home')
@section('content')
<form action="{{ route('teachers.update',$teacher->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Guru:</strong>
                <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" placeholder="Nama Guru">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="alamat" name="alamat" class="form-control" placeholder="alamat" value="{{ $teacher->alamat }}">
                @error('alamat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mata Pelajaran:</strong>
                <select name="mapel" class="form-control">
                    <option value="">Mata Pelajaran</option>
                    <option value="Kimia" {{ $teacher->matapelajaran == 'Kimia' ? 'selected' : '' }}>Kimia</option>
                    <option value="Fisika" {{ $teacher->matapelajaran == 'Fisika' ? 'selected' : '' }}>Fisika</option>
                    <option value="Geografi" {{ $teacher->matapelajaran == 'Geografi' ? 'selected' : '' }}>Geografi</option>
                    <option value="Matematika" {{ $teacher->matapelajaran == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                    <!-- Tambahkan opsi mata pelajaran sesuai kebutuhan -->
                </select>
                @error('matapelajaran')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('teachers.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection