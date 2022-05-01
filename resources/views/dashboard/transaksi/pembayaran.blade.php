<div class="p2">
    <h3>Proses Pencucian dan Pembayaran</h3>
    <table class="table table-success table-striped">
        <thead>
            <tr>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">No_telpon</th>
              <th scope="col">Penanggung jawab</th>
              <th scope="col">Status Cucian</th>
              <th scope="col">Status Pembayaran</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataPesanan as $dp)
                @if($dp->statuscucian != 1 || $dp->statusbayar != 1)
                    
                    <tr>
                    <td>{{ $dp->nama_pelanggan }}</td>
                    <td>{{ $dp->no_telp }}</td>
                    <td>{{ $dp->name }}</td>
                    @if ($dp->statuscucian == 1)
                        <td>Cucian Sudah Dicuci</td>
                    @else
                        <td><button class="border-0 badge bg-danger" onClick="sudahDicuci({{ $dp->id }})">Belum Di Cuci</button></td>
                    @endif

                    @if ($dp->statusbayar == 1)
                        <td>sudah dibayar</td>
                    @else
                        <td><button class="border-0 badge bg-success" onClick="sudahBayar({{ $dp->id }})">Belum Di Bayar</button></td>
                @endif
                
                    </tr>
                @endif
            @endforeach
          </tbody>
      </table>


    <script>
        function sudahDicuci(id)
            {
                let tes = confirm("apakah sudah dicuci?");
                if(tes == true){
                    $.ajax({
                        type:"post",
                        url:"{{ url('/transaksi/sudahDicuci') }}/"+id,
                        data:{
                            "_method" : "post",
                            "_token" : "{{ csrf_token() }}"
                        },
                        success:function(data){
                            pembayaran();
                            console.log(data);
                        }           
                    });
                }
            }

        function sudahBayar(id)
        {
            $('#exampleModal').modal('hide');
            $('.modal-dialog').removeClass('modal-xl');
            $.ajax({
                type:"get",
                url:"{{ url('/transaksi') }}/"+id+"/edit",
                
                success:function(data){
                    $('#exampleModalLabel').html('Pembayaran');
                    $('#page').html(data);
                    $('#exampleModal').modal('show');
                }
            });
        }
    </script>
</div>