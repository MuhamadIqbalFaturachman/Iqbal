@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<div class="text-end mb-2">
  <a class="btn btn-light" href="{{ route('users.exportpdf') }}"> Cetak</a>
  <a class="btn btn-success" href="{{ route('users.create') }}"> Add User</a>
</div>
<table id="example" class="table table-striped" style="width:100%">
  <thead>
    <tr style="background-color: #0000FF;">
      <th scope="col" style="color: #FFFFFF;">No</th>
      <th scope="col" style="color: #FFFFFF;">Nama</th>
      <th scope="col" style="color: #FFFFFF;">Email</th>
      <th scope="col" style="color: #FFFFFF;">Password</th>
      <th scope="col" style="color: #FFFFFF;">Positions</th>
      <th scope="col" style="color: #FFFFFF;">Departements</th>
      <th scope="col" style="color: #FFFFFF;">Actions</th>
    </tr>
  </thead>
  <tbody style="background-color: #D4EFDF;">
    @php $no = 1 @endphp
    @foreach ($users as $data)
    <tr>
      <td>{{ $no ++ }}</td>
      <!-- <td>{{ $data->id }}</td> -->
      <td>{{ $data->name }}</td>
      <td>{{ $data->email }}</td>
      <td>{{ $data->password }}</td>
      <td>{{ $data->positions }}</td>
      <td>{{ $data->name }}</td>
      <!-- <td>{{
        (isset($data->manager->name))?
      $data->manager->name : 
    'Tidak Ada'}}</td> -->
      <td>
        <form action="{{ route('users.destroy',$data->id) }}" method="Post">
          <a class="btn btn-primary" href="{{ route('users.edit',$data->id) }}">Edit</a>
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
@section('js')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@endsection