<div class="p2">
    <h3>Pengambilan Cucian</h3>
    <table class="table table-success table-striped">
        <thead>
            <tr>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">No_telpon</th>
              <th scope="col">Penanggung jawab</th>
              <th scope="col">Status Pengembalian</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataPesanan as $dp)
                @if($dp->statuscucian == 1 && $dp->statusbayar == 1)
                    
                    <tr>
                    <td>{{ $dp->nama_pelanggan }}</td>
                    <td>{{ $dp->no_telp }}</td>
                    <td>{{ $dp->name }}</td>
                    @if ($dp->statusambil == 1)
                        <td>Cucian Sudah Diambil pada tanggal {{ $dp->updated_at }}</td>
                    @else
                        <td><button class="border-0 badge bg-danger" onClick="sudahDiambil({{ $dp->id }})">Belum Di Ambil</button></td>
                    @endif

                    </tr>
                @endif
            @endforeach
          </tbody>
      </table>


    <script>
       function sudahDiambil(id){
           let tes = confirm("sudah bisa di ambilkan?");
           if(tes == true){
                $.ajax({
                    type:"post",
                    url:"{{ url('/transaksi/sudahDiambil') }}/"+id,
                    data:{
                        "_method" : "post",
                        "_token" : "{{ csrf_token() }}"
                    },
                    success:function(data){
                        pengambilan();
                    }
                });
           }
       }
    </script>
</div>