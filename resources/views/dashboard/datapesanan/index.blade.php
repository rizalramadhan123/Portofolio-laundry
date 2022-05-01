@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-center ">
  <h1 class="h2">Kelola Data User</h1>
</div>
<div class="d-flex justify-content-center">
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{ session('success') }}
  </div>
  @endif
</div>

<div class="d-flex justify-content-center">
  
<div class="table-responsive col-lg-10">
  <div class="mb-3">
    <label for="cari" class="form-label">Cari Data</label>
    <input type="name" class="form-control" id="cari" placeholder="silahkan cari">
  </div>
 
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">nama pelanggan</th>
        <th scope="col">berat cucian</th>
        <th scope="col">harga perkilo cucian</th>
        <th scope="col">total</th>
        <th scope="col">uang</th>
        <th scope="col">kembalian</th>
        <th scope="col">petugas pengelola</th>
        <th scope="col">detergen yang dipakai</th>
        <th scope="col">status cucian</th>
        <th scope="col">status bayar</th>
        <th scope="col">status ambil</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dataPelanggan as $dp)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $dp->nama_pelanggan }}</td>
          <td>{{ $dp->berat_barang }}</td>
          <td>{{ $dp->hargaperkilo }}</td>
          <td>{{ $dp->total }}</td>
          <td>{{ $dp->uang }}</td>
          <td>{{ $dp->kembalian }}</td>
          <td>{{ $dp->name }}</td>
          <td>{{ $dp->nama_detergen }}</td>
          @if ($dp->statuscucian == '1')
            <td> sudah dicuci</td>
          @else
            <td> sedang dicuci </td>
          @endif

          @if ($dp->statusbayar == '1')
            <td> sudah dibayar</td>
          @else
            <td> belum dibayar </td>
          @endif
          
          @if ($dp->statusambil == '1')
            <td> sudah diambil</td>
          @else
            <td> belum diambil </td>
          @endif
          
         
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
  cari();
});

function cari(){
  let keyword = $('#cari').val();
  $.ajax({
    type: "post",
    url: "{{ url('dataPelanggan/search') }}",
    data:{
      "_token" : "{{ csrf_token() }}",
      "keyword" : keyword,
    },
    success:function(data){
      table_row(data);
      console.log(data);
    }
  });
}

function table_row(res){
  let htmlView = '';

  for(let i = 0; i < res.dataPelanggan.length;i++){
    let statuscucian = '';
  let statusbayar = '';
  let statusambil = '';
    if(res.dataPelanggan[i].statuscucian == '1'){
      statuscucian += 'sudah dicuci';
    }else{
      statuscucian = 'sedang dicuci';
    }

    if(res.dataPelanggan[i].statusbayar == '1'){
      statusbayar = 'sudah dibayar';
    }else{
      statusbayar = 'belum dibayar';
    }

    if(res.dataPelanggan[i].statusambil == '1'){
      statusambil = 'sudah diambil';
    }else{
      statusambil = 'belum diambil';
    }
    
    htmlView += `
    <tr>
          <td>`+ (i+1) +`</td>
          <td>`+ res.dataPelanggan[i].nama_pelanggan +`</td>
          <td>`+ res.dataPelanggan[i].berat_barang +`</td>
          <td>`+ res.dataPelanggan[i].hargaperkilo +`</td>
          <td>`+ res.dataPelanggan[i].total +`</td>
          <td>`+ res.dataPelanggan[i].uang +`</td>
          <td>`+ res.dataPelanggan[i].kembalian +`</td>
          <td>`+ res.dataPelanggan[i].name +`</td>
          <td>`+ res.dataPelanggan[i].nama_detergen +`</td>
          <td>`+ statuscucian +`</td>
          <td>`+ statusbayar +`</td>
          <td>`+ statusambil +`</td>
      </tr>`;
  }
$('tbody').html(htmlView);
}
</script>

@endsection
