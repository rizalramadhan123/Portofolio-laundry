<div class="p2">
  

  <h3>Transaksi dikelola oleh Petugas {{ auth()->user()->name }}</h3>
    <form data-action="/transaksi" method="post" id="form_transaksi">
      @csrf
      <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
      <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" placeholder="Masukan nama pelanggan" name="nama_pelanggan" required>
      </div>
      
      <div class="mb-3">
        <label for="no_telp" class="form-label">No Telepon</label>
        <input type="text" class="form-control" id="no_telp" placeholder="Masukan nomor telepon" name="no_telp" required>
      </div>
      
      <div class="mb-3">
        <label for="id_detergen" class="form-label">Detergen</label>
        <select class="form-select" aria-label="Default select example" id="id_detergen" name="id_detergen">
          @foreach ($dataDetergen as $dd)     
            <option value="{{ $dd->id }}">{{ $dd->nama_detergen }} | {{ $dd->harga_detergen }}</option>
          @endforeach
        </select>
      </div>
      
      
      <div class="mb-3">
        <label for="hargaperkilo" class="form-label">Harga Kiloan</label>
        <input type="text" class="form-control" id="hargaperkilo" readonly value="{{ $dataHarga }}" name="hargaperkilo" required>
      </div>
      
      <div class="mb-3">
        <label for="berat_barang" class="form-label">Berat Barang</label>
        <input type="text" class="form-control" id="berat_barang" placeholder="masukan berat Barang" name="berat_barang" required>
      </div>
      
      <div class="mb-3">
        <label for="total" class="form-label">Total harus bayar</label>
        <input type="text" class="form-control" id="total" placeholder="yang harus anda bayar" readonly name="total" required>
      </div>

      <div class="mb-3">
        <label for="uang" class="form-label">Uang</label>
        <input type="text" class="form-control" id="uang" placeholder="masukan uang atau kosongkan" name="uang">
      </div>

      <div class="mb-3">
        <label for="kembalian" class="form-label">kembalian</label>
        <input type="text" class="form-control" id="kembalian" placeholder="kembalian anda" readonly name="kembalian">
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
      
    <script>
      
      $(document).ready(function(){
        let form = '#form_transaksi';

        $(form).on('submit',function(event){
          event.preventDefault();

          let url = $(this).attr('data-action');

          $.ajax({
            url : url,
            method : 'post',
            data:new FormData(this),
            dataType:'JSON',
            contentType:false,
            cache:false,
            processData:false,
            success:function(response)
            {
              cetakData(response);
            }
          });
        });
      });
      
      function cetakData(response){
        let uang = '';
        let kembalian = '';
        let nilai = response.data.updated_at;
        let arrayNilai = nilai.split('-');
        let arrayNilaiBaru = arrayNilai[2].split('T');


        if(response.data.statusbayar == 1){
          uang = response.data.uang;
          kembalian = response.data.kembalian;
        }else{
          uang = 'belum dibayar';
          kembalian = 'belum dibayar';
        }
        htmlView = `
            <p>Transaksi Ini Dikelola Oleh : `+ response.datauser.name +`</p>
            <table class="table-borderless">
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>: `+ response.data.nama_pelanggan +`</td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>: `+ response.data.no_telp +`</td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td>Tanggal : `+ arrayNilaiBaru[0] +`. Bulan : `+ arrayNilai[1] + `. Tahun:`+ arrayNilai[0] +`</td>
                </tr>
                <tr>
                    <td>Harga Perkilo</td>
                    <td>: `+ response.data.hargaperkilo +`</td>
                </tr>
                <tr>
                    <td>Detergen yang digunakan</td>
                    <td>: `+ response.datadetergen.nama_detergen +`| Harga : Rp.`+ response.datadetergen.harga_detergen +`</td>
                </tr>
                <tr>
                    <td>Berat Cucian</td>
                    <td>: `+ response.data.berat_barang +`</td>
                </tr>
                <th></th>
                <tr>
                    <td>total harga</td>
                    <td>: `+ response.data.total +`</td>
                </tr>
                <tr>
                    <td>uang</td>
                    <td>: `+ uang +`</td>
                </tr>
                <tr>
                    <td>kembalian</td>
                    <td>: `+ kembalian +`</td>
                </tr>
            </table>
        `;
        $('#page').html(htmlView);
        window.print();
      }
      

      $('input[name=berat_barang]').on('keyup',function(){
        let berat = $('input[name=berat_barang]').val();
        let hargaperkilo = $('input[name=hargaperkilo]').val();
        let tes = $('#id_detergen').find(":selected").text();
        let arrayTes = tes.split(" | ");

        let total = berat * hargaperkilo + parseInt(arrayTes[1]);

        $('input[name=total]').val(total);
      });

      $('input[name=uang]').on('change',function(){
        let uang = $('input[name=uang]').val();
        let total = $('input[name=total]').val();
        
        if(parseInt(total) > parseInt(uang)){
          alert('pastikan uang yang anda masukan lebih besar');
          $('input[name=kembalian]').val('');
        }else{
          hasil = uang - total
          $('input[name=kembalian]').val(hasil);
        }
      });
      

    </script>
</div>