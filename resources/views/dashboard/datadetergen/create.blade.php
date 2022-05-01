<div class="p2">
    <form action="/dataDetergen" method="post" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="nama_detergen" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('nama_detergen') is-invalid @enderror" id="nama_detergen" name="nama_detergen" required autofocus value="{{ old('nama_detergen') }}">
            @error('nama_detergen')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="harga_detergen" class="form-label">Harga Barang</label>
            <input type="text" class="form-control @error('harga_detergen') is-invalid @enderror" id="harga_detergen" name="harga_detergen" required value="{{ old('harga_detergen') }}">
            @error('harga_detergen')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
            @enderror
          </div>
        <div class="form-group mt-2">
            <button class="btn btn-success">Create</button>
        </div>
    </form>
</div>