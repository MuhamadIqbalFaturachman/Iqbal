@extends('home')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<div class="text-end mb-2">
  <a class="btn btn-light" href="{{ route('teachers.exportpdf') }}"> Cetak</a>
  <a class="btn btn-success" href="{{ route('teachers.create') }}">Add Teacher</a>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @php $no = 1 @endphp
    @foreach ($teacher as $data)
    <tr class="table-hover-color">
      <td>{{ $no ++ }}</td>
      <!-- <td>{{ $data->id }}</td> -->
      <td>{{ $data->name }}</td>
      <td>{{ $data->alamat }}</td>
      <td>{{ $data->matapelajaran}}</td>

      <td>
        <form action="{{ route('teachers.destroy',$data->id) }}" method="Post">
          <a class="btn btn-primary" href="{{ route('teachers.edit',$data->id) }}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection