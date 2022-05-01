@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-center ">
  <h1 class="h2">Kelola Data User</h1>
</div>
<div class="d-flex justify-content-center">
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif
</div>

<div class="d-flex justify-content-center">
  
<div class="table-responsive col-lg-6">
  <div class="mb-3">
    <label for="cari" class="form-label">Cari Data</label>
    <input type="name" class="form-control" id="cari" placeholder="silahkan cari">
  </div>
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="create()">Detergen baru</button>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">nama detergen</th>
        <th scope="col">harga</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datadetergen as $d)
      <tr id="sid{{ $d->id }}">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $d->nama_detergen }}</td>
          <td>{{ $d->harga_detergen }}</td>
          
          
          <td>
              <button class="badge bg-warning border-0" onClick="edit({{ $d->id }})">edit</button>
              <button class="badge bg-danger border-0" onClick="destroy({{ $d->id }})">Delete</button>
              
              
          </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="page" class="p-2"></div>
      </div>
      
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$('#cari').on('keyup',function(){
  search();
});

function search(){
  let keyword = $('#cari').val();
  $.ajax({
            type:"post",
            url:"{{ url('dataDetergen/search') }}",
            data:{
              "_token": "{{ csrf_token() }}",
              "keyword":keyword,
            },
            success:function(data){
              table_post_row(data)
            }
            
        });
}

function table_post_row(res){
let htmlView = '';

for(let i = 0; i < res.datadetergen.length; i++){
    htmlView += `
    <tr id="sid{{ $d->id }}">
              <td>`+ (i+1) +`</td>
              <td>`+res.datadetergen[i].nama_detergen+`</td>
              <td>`+res.datadetergen[i].harga_detergen+`</td>
              
              
              <td>
                  <button class="badge bg-warning border-0" onClick="edit( `+res.datadetergen[i].id+` )">edit</button>
                  <button class="badge bg-danger border-0" onClick="destroy( `+res.datadetergen[i].id+`)">Delete</button>
                  
                  
              </td>
          </tr>`;
}
     $('tbody').html(htmlView);
}
  
  function create(){
        $.get("{{ url('dataDetergen/create') }}",{},function(data,status){
            $('#exampleModalLabel').html('Create Product');
            $('#page').html(data);
            $("#exampleModal").modal('show');
        });
        
  }
  
  function edit(id){
    $.get("{{ url('dataDetergen') }}/"+id+"/edit",{},function(data,status){
            $('#exampleModalLabel').html('Edit Product');
            $('#page').html(data);
            $("#exampleModal").modal('show');
        });
        
  }
  
  function destroy(id){
        confirm('yakin mau dihapus?');
        $.ajax({
            type:"delete",
            url:"{{ url('dataDetergen') }}/"+id,
            data:{
              "_token": "{{ csrf_token() }}"
            },
            success:function(data){
              alert('sudah berhasil di hapus');
              window.location.reload(1);
            }
            
        });
    }
</script>

@endsection
