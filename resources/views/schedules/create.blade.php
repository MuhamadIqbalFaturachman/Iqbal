@extends('home')
@section('content')

<form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jadwal:</strong>
                <input type="text" name="jadwal" class="form-control" placeholder="Masukan Jadwal">
                @error('jadwal')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mata Pelajaran:</strong>
                    <select name="matapelajaran" class="form-control">
                        <option value="">Pilih Mata Pelajaran</option>
                        <option value="Kimia">Kimia</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Geografi">Geografi</option>
                        <option value="Matematika">Matematika</option>
                    </select>
                    @error('matapelajaran')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="teacher"><strong>Guru :</strong></label>
                <select name="teacher" class="form-select">
                    @foreach ($teacher as $teacher)
                    <option value="{{ $teacher->name}}">{{$teacher->name}}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('schedules.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection