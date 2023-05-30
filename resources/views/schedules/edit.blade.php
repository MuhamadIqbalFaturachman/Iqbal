@extends('home')
@section('content')
<form action="{{ route('schedules.update',$schedules->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position Name:</strong>
                <input type="text" name="name" value="{{ $schedules->name }}" class="form-control" placeholder="schedules name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jadwal:</strong>
                <input type="keterangan" name="jadwal" class="form-control" placeholder="jadwal" value="{{ $schedules->jadwal }}">
                @error('jadwal')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mata Pelajaran:</strong>
                <select name="matapelajaran" class="form-control">
                    <option value="">Pilih Mata Pelajaran</option>
                    <option value="Fisika">Fisika</option>
                    <option value="Kimia">Kimia</option>
                    <option value="Geografi">Geografi</option>
                    <option value="Matematika">Matematika</option>
                </select>
                @error('matapelajaran')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Guru:</strong>
                <select name="teachers" class="form-control">
                    @foreach ($teacherss as $teachers)
                    <option value="{{ $teachers->name}}" {{($teachers->teachers == $teachers->name) ? 'selected' : ''}}>{{$teachers->name}}</option>
                    @endforeach
                </select>
                @error('teachers')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                <a button type="submit" class="btn btn-danger mt-4" href="{{ route('schedules.index') }}">Back</a>
            </div>
        </div>
</form>
@endsection