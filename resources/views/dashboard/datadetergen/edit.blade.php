<div class="p2">
    <form action="/dataDetergen/{{ $datadetergen->id }}" method="post">
        @method('put') 
        @csrf
        <div class="mb-3">
            <label for="nama_detergen" class="form-label">nama detergen</label>
            <input type="text" class="form-control @error('nama_detergen') is-invalid @enderror" id="nama_detergen" name="nama_detergen" required value="{{ old('nama_detergen',$datadetergen->nama_detergen) }}">
            @error('nama_detergen')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_detergen" class="form-label">harga detergen</label>
            <input type="text" class="form-control @error('harga_detergen') is-invalid @enderror" id="harga_detergen" name="harga_detergen" required value="{{ old('harga_detergen',$datadetergen->harga_detergen) }}">
            @error('harga_detergen')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
    
</div>