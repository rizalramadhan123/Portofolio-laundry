@extends('dashboard.layouts.main')

@section('container')
<meta name="_token" content="{{ csrf_token() }}">
<div class="d-flex justify-content-center ">
  <h1 class="h2">Kelola Data User</h1>
</div>
<div class="d-flex justify-content-center">
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif
</div>

<div class="d-flex justify-content-center">
 
<div class="table-responsive col-lg-8">
  <a href="/dataUser/create" class="btn btn-primary mb-3">user baru</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Akses</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
          <tr id="sid{{ $user->id }}">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              @if($user->is_admin == 1)
                <td>Admin</td>
              @else
                <td>petugas</td>
              @endif
              
              <td>
                  <a href="/dataUser/{{ $user->id }}/edit" class="badge bg-warning text-decoration-none">edit</a>
                  <button class="badge bg-danger" onClick="destroy({{ $user->id }})">Delete</button>
                  
                  
              </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
   
  function destroy(id){
        confirm('yakin mau dihapus?');
        $.ajax({
            type:"get",
            url:"{{ url('destroy') }}/"+id,
            success:function(){
              alert('data berhasil dihapus');
              window.location.reload(1);
              
            }
        });
    }
</script>

@endsection
