<div class="p2">
    <h3>Transaksi dikelola oleh Petugas {{ auth()->user()->name }}</h3>
      <form action="/transaksi/{{$data->id}}" method="post">
        @method('put')
            @csrf
            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
            <div class="mb-3">
            <label for="total" class="form-label">Total harus bayar</label>
            <input type="text" class="form-control" id="total" placeholder="yang harus anda bayar" readonly name="total" required value="{{ $data->total }}" >
            </div>
    
            <div class="mb-3">
            <label for="uang" class="form-label">Uang</label>
            <input type="text" class="form-control" id="uang" placeholder="masukan uang" name="uang">
            </div>
    
            <div class="mb-3">
            <label for="kembalian" class="form-label">kembalian</label>
            <input type="text" class="form-control" id="kembalian" placeholder="kembalian anda" readonly name="kembalian">
            </div>
    
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
      </form>
        
      <script>
       $('input[name=uang]').on('change',function(){
         let total = $('input[name=total]').val();
         let uang = $('input[name=uang]').val();
         if(parseInt(total) > parseInt(uang)){
           alert("pastikan uang lebih besar dari total nya atau sama");
           $('input[name=kembalian]').val('');
         }else{
           let hasil = uang - total;
           $('input[name=kembalian]').val(hasil);
         }
       });
      </script>
  </div>