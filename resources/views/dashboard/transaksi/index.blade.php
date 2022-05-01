@extends('dashboard.layouts.main')

@section('container')
<style>
  @media print {
  footer {page-break-after: always;}
}
</style>

<div class="d-flex justify-content-center ">
  <h1 class="h2">Selamat Datang {{ auth()->user()->name }}</h1>
</div>


<div class="d-flex justify-content-center">
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{ session('success') }}
  </div>
  @endif
</div>


<div class="d-flex justify-content-center">
    <div class="col-lg-10">
        <div class="card-group">
            <div class="card" style="width: 20rem;">
                <div style="max-height: 250px">
                    <img class="card-img-top" src="img/bglaundry.jpg" alt="Card image cap" style="height:250px;">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Pemesanan</h5>
                  <p class="card-text">Hi {{ auth()->user()->name }} apabila ingin menuliskan pesanan gunakan menu ini yah</p>
                  <button class="btn btn-primary border-0" onClick="create()">Proses</button>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <div style="max-height: 250px">
                    <img class="card-img-top" src="img/cucianmasuk.jpg" alt="Card image cap" style="height:250px;">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Cucian Masuk</h5>
                  <p class="card-text">Hi {{ auth()->user()->name }} apabila ingin mengelola pembayaran gunakan menu yang ini yah</p>
                  <button class="btn btn-primary border-0" onClick="pembayaran()">Proses</button>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <div style="max-height: 250px">
                    <img class="card-img-top" src="img/cuciankeluar.jpg" alt="Card image cap" style="height:250px;">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Cucian Keluar</h5>
                  <p class="card-text">Hi {{ auth()->user()->name }} ingin mengambil cucian gunakan menu ini</p>
                  <button class="btn btn-primary border-0"  onClick="pengambilan()">Proses</button>
                </div>
              </div>
              
            </div>
          </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
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
 function create(){
    $.get("{{ url('/transaksi/create') }}",{},function(data,status){
        $('#exampleModalLabel').html('Isi Data Pemesanan');
        $('#page').html(data);
        $('.modal-dialog').addClass('modal-lg');
        $('#exampleModal').modal('show');
    });
 }
 
 function pembayaran(){
    $.ajax({
        type:"post",
        url:"{{ url('/transaksi/pembayaran') }}",
        data:{
            "_method" : "post",
            "_token" : "{{ csrf_token() }}"
        },
        success:function(data){
            $('#exampleModalLabel').html('Cucian Masuk'),
            $('#page').html(data);
            $('.modal-dialog').addClass('modal-xl');
            $('#exampleModal').modal('show');
        }
    });
 }

 function pengambilan(){
    $.ajax({
        type:"post",
        url: "{{ url('/transaksi/pengambilan') }}",
        data:{
            "_method" : "post",
            "_token" : "{{ csrf_token() }}"
        },
        success:function(data){
            $('#exampleModalLabel').html('Cucian Keluar');
            $('#page').html(data);
            $('.modal-dialog').addClass('modal-xl');
            $('#exampleModal').modal('show');
        }
    });
   
 }


</script>

@endsection
